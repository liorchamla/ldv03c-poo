<?php

namespace App;

class SendEmailToClient
{
    public function send($order)
    {
        var_dump("Email envoyé au client", $order);
    }
}
