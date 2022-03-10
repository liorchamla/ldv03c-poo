<?php

namespace App\Http;

class RedirectResponse extends Response
{
    public function __construct(string $url)
    {
        parent::__construct("", 301, [
            "Location" => $url
        ]);
    }
}
