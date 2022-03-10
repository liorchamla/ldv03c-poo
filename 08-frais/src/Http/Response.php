<?php

namespace App\Http;

class Response
{
    public function __construct(
        public string $content = "",
        public int $statusCode = 200,
        public array $headers = []
    ) {
    }

    public function send()
    {
        echo $this->content;
        http_response_code($this->statusCode);
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
    }
}
