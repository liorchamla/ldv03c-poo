<?php

namespace App;

class Order
{
    public function __construct(public string $email, public string $phone, public int $total)
    {
    }
}
