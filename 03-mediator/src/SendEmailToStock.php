<?php

namespace App;

class SendEmailToStock
{
    public function send($order)
    {
        var_dump("Email envoyé au stock", $order);
    }
}
