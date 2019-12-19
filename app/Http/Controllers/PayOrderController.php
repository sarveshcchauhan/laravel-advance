<?php

namespace App\Http\Controllers;

use App\Orders\OrderDetails;
use Illuminate\Http\Request;
use App\Billing\PaymentGateway;

class PayOrderController extends Controller
{

    public function store(OrderDetails $orderDetails, PaymentGateway $PaymentGateway){
        // $payment = new PaymentGateway('usd');
        $order = $orderDetails->all();
        dd($PaymentGateway->charge(2000));
    }

}
