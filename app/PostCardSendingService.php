<?php

namespace App;

use Illuminate\Support\Facades\Mail;

class PostCardSendingService {

    private $country,$height,$width;
    
    public function __construct($country,$width,$height){
        $this->country = $country;
        $this->width= $width;
        $this->height = $height;
    }

    public function hello($message, $email){
        Mail::raw($message, function ($message) use ($email) {
            $message->to($email);
        });

        dump('Postcard was send with message =>'.$message); 
    }

}
