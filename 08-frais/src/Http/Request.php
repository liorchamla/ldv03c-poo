<?php

namespace App\Http;

class Request
{
    public function __construct(public string $pathInfo, public string $method = "GET", public array $params = [])
    {
    }
}
