<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user')->orderBy("id", "desc")->paginate(10);
        return view('admin.payment.list', compact('payments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $payment = Payment::with('user')->where("id",$id)->first();
        return view('admin.payment.show', compact('payment'));
    }

    public function edit(Orders $orders)
    {
        //
    }

    public function update(Request $request, Orders $orders)
    {
        //
    }

    public function destroy(Orders $orders)
    {
        //
    }
}
