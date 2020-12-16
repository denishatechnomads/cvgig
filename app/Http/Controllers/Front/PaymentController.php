<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Subscription;
use App\Model\UserLetter;
use App\Model\UserResumes;
use Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Socialite;
use Session;
use DB;
use Str;

class PaymentController extends Controller
{
    public function checkout($type, $id)
    {
        try {

            if ($type == "resume") {
                $record = UserResumes::where("id", $id)->first();
            } else {
                $record = UserLetter::where("id", $id)->first();
            }
            return view('checkout', compact('type', 'record'));
        } catch (\Exception $e) {
            return redirect()->back()->withError("Error: " . $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        try {
//        echo "<pre>";print_r($request->all());exit();
            $userId = Auth::user()->id;
            $resumes = UserResumes::where("user_id", $userId)->get();
            $letters = UserLetter::where("user_id", $userId)->get();
//        echo "<pre>";print_r($resumes[0]);exit();

            $type = 'Resume';
            $selectedData = $resumes[0];
            if ($request->type == 'Letter') {
                $type = 'Letter';
                $selectedData = UserLetter::where("user_id", $userId)->where("id", $request->record_id)->first();
            } else if ($request->type == 'Resume') {
                $type = 'Resume';
                $selectedData = UserResumes::where(["user_id" => $userId, "id" => $request->record_id])->first();
            }
            return view("dashboard", compact('resumes', 'letters', 'selectedData', 'type'));
        } catch (\Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
            exit();
            return redirect()->back()->withError("Error: " . $e->getMessage());
        }
    }

    public function paypalResponse($type, $id, Request $request)
    {
        try {
//            echo"<pre>";print_r($request->all());exit();
            $recordObject = "";
            if($type == "resume"){
                $recordObject = UserResumes::where("id",$id)->first();
            }else{
                $recordObject = UserLetter::where("id",$id)->first();
            }


            $paymentData = [];
            $paymentData['user_id'] = Auth::user()->id;
            $paymentData['payment_id'] = $request->id;
            $paymentData['amount'] = 1;
            $paymentData['discount'] = 0;
            $paymentData['total_amount'] = 1;
            $paymentData['reference_id'] = $id;
            $paymentData['resume_type'] = $type;
            $paymentData['payment_type'] = "paypal";

            if($request->status == "COMPLETED"){
                $paymentData['payment_status'] = "succeed";
            }else{
                $paymentData['payment_status'] = "failed";
            }

            Payment::create($paymentData);
            return response()->json(["Success"=>true,"Message"=>"Your payment completed successfully."]);
        }catch (\Exception $e){
            return response()->json(["Success"=>false,"Message"=>$e->getMessage()]);
        }
    }

    public function paymentRequest(Request $request){
        $subscription = Subscription::where("is_active",true)->orderBy('created_at','DESC')->first();

        try{
            $payerName = "";
            $payerPhone = "";
            $mid = "mer1900023";
            $tex = $random_pwd = mt_rand(1000000000000000, 9999999999999999);
            $txnRefNo = $tex;
            $su = "https://demo.bookeey.com/portal/paymentSuccess";
            $fu = "http://cvgig.test/";
            $amt = $subscription->price;
            $rndnum = rand(10000,99999);
            $crossCat = "GEN";
            $secretKey = "7422461";
            $defaultPaymentOption = "Bookeey";
            $selectedPaymentOption = "Bookeey";
            $data = "$mid|$txnRefNo|$su|$su|$amt|$crossCat|$secretKey|$rndnum";
            $hashed = hash('sha512', $data);

            $paymentGatewayUrl = "https://apps.bookeey.com/pgapi/api/payment/requestLink";
            $txnDtl = [];
            $txnHdr = array(
                "BKY_Txn_UID" => "",
                "PayFor" => "ECom",
                "Txn_HDR" => "$rndnum",
                "PayMethod" => $selectedPaymentOption,
                "Merch_Txn_UID" => "141679915688",
                "hashMac" => $hashed
            );

            $appInfo = array(
                "APPTyp" => "",
                "APPID" =>"",
                "OS" => 'Android',
                "DevcType" => 5,
                "IPAddrs" => "",
                "Country" => "",
                "AppVer" => "",
                "UsrSessID" => "",
                "APIVer" => "",
                "HsCode" => "",
                "MdlID" => "",

            );

            $pyrDtl = array(
                "Pyr_MPhone" => $payerPhone,
                "Pyr_Name" => $payerName
            );

            $merchDtl = array(
                "BKY_PRDENUM" => "ECom",
                "FURL" => $fu,
                "MerchUID" => $mid,
                "SURL" => $su
            );

            $moreDtl = array(
                "Cust_Data1" => "",
                "Cust_Data3" => "",
                "Cust_Data2" => ""
            );

            $postParams['Do_TxnDtl'] = $txnDtl;
            $postParams['Do_TxnHdr'] = $txnHdr;
            $postParams['Do_Appinfo'] = $appInfo;
            $postParams['Do_PyrDtl'] = $pyrDtl;
            $postParams['Do_MerchDtl'] = $merchDtl;
            $postParams['DBRqst'] = "PY_ECom";
            $postParams['Do_MoreDtl'] = $moreDtl;

            $headers = array(
                'Accept: application/json',
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$paymentGatewayUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParams));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $serverOutput = curl_exec($ch);
            $decodeOutput = json_decode($serverOutput, true);
            curl_close ($ch);
            if (isset($decodeOutput['PayUrl'])) {
                if ($decodeOutput['PayUrl'] == '') {
                    Return redirect()->back();
                }else{
                    Return redirect($decodeOutput['PayUrl']);
                }
            }else{
                Return redirect()->back();
            }

        }catch (\Exception $exception){
            return response()->json(["Success"=>false,"Message"=>$exception->getMessage()]);
        }
    }
}
