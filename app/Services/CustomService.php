<?php


namespace App\Services;

use Log;
use Twilio\Rest\Client;

class CustomService
{
    public function sendPushNotification($userId,$deviceToken, $title, $body)
    {
        try {

            Log::info("sendPush Notification call");
            $data = ["to" => $deviceToken,
                "notification" =>
                    [
                        "title" => $title,
                        "body" => $body,
                        'sound' => true,
                    ],
            ];
            $dataString = json_encode($data);
            Log::info("Notification data:", [$dataString]);
            $headers = [
                'Authorization: key=' . config('constant.FCM_SERVER_KEY') . '',
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $result = curl_exec($ch);
            curl_close($ch);

            Log::info("Notification response:", [$result]);

            /* save notification */
            $notfData["user_id"]= $userId;
            $notfData["title"]= $title;
            $notfData["message"]= $body;
            $notfData["response"]= $result;

//            Notification::create($notfData);

            return ['status' => true, 'response' => $result];
        } catch (Exception $e) {
            Log::error("Notification Error", ["msg" => $e->getMessage(), "details" => $e->getTraceAsString()]);
            return ['status' => false, 'response' => $e->getMessage()];
        }
    }

    public function sendMessage($message, $recipients)
    {
        try {

            $accountSid = config("constants.TWILIO_SID");
            $authToken = config("constants.TWILIO_AUTH_TOKEN");
            $twilioNumber = config("constants.TWILIO_NUMBER");
            $client = new Client($accountSid, $authToken);
            $response = $client->messages->create($recipients, ['from' => $twilioNumber, 'body' => $message]);
            return $response;
        }catch (\Exception $e){
            echo "<pre>";print_r($e->getMessage());exit();
        }
    }

}
