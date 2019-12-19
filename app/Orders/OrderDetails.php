<?php

namespace App\Orders;

use App\Billing\PaymentGateway;

class OrderDetails {

    private $PaymentGateway;

    public function __construct(PaymentGateway $paymentGateway){
        $this->paymentGateway = $paymentGateway;
    }

    public function all(){
        $this->paymentGateway->setDiscount(100);

        return [
            'name' =>'abc',
            'address' => 'abc1 new street',
        ];
    }
}
