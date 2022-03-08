<?php

namespace App;

class SendSmsToClient
{
    public function send($order)
    {
        var_dump("SMS envoyé au client", $order);
    }
}
