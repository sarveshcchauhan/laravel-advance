<?php

namespace App\Billing;

use Illuminate\Support\Str;


class PaymentGateway{

    private $currency;
    private $discount;

    public function __construct($currency){
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($discount){
        $this->discount = $discount;
    }

    public function charge($amt)
    {
        return [
            'amount' => $amt - $this->discount,
            'tras_id' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
        ];
    }
}