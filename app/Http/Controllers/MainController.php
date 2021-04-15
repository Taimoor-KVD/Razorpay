<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;

use Razorpay\Api\Api;

use Session;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment_module.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Custom function for payment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        // Form data
        $name = $request->input('name');
        $amount = $request->input('amount');
        
        // Api Keys
        $api_key = "rzp_test_KRQjWCJfgLUgA6";
        $api_secret = "uJwJmAOm4dyWtpHlisuGLrvJ";

        $api = new Api($api_key, $api_secret);

        // For Orders
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100, 'currency' => 'INR'));
        $order_id = $order['id'];

        // Storing data into database
        $user_pay = new Payment();
        
        $user_pay->name = $name;
        $user_pay->amount = $amount;
        $user_pay->payment_id = $order_id;
        $user_pay->save();

        $data = [
            'order_id' => $order_id,
            'amount' => $amount,
        ];

        return redirect()->route('home')->with('data', $data);
    }

    /**
     * Custom function for pay.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        // Form data
        $data = $request->all();
        
        // Update user payment details
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->razorpay_id = $data['razorpay_payment_id'];
        $user->status = true;
        $user->save();

        return redirect('/success');
    }

    /**
     * Custom function for success page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        return view('payment_module.success');
    }
}