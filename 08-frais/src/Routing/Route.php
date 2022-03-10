<?php

namespace App\Routing;

use App\Http\Request;

class Route
{
    public function __construct(
        public string $url,
        public string $className,
        public string $method = 'GET'
    ) {
    }

    public function match(Request $request): bool
    {
        return $this->url === $request->pathInfo && $this->method === $request->method;
    }
}
