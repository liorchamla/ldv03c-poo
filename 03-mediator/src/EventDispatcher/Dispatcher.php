<?php

namespace App\EventDispatcher;

class Dispatcher
{
    private array $comportements = [];

    public function dispatch(string $event, $data)
    {
        $comportementAAppelers = $this->comportements[$event];

        foreach ($comportementAAppelers as $comportement) {
            $comportement($data);
        }
    }

    public function register(callable $comportement, string $event)
    {
        if (empty($this->comportements[$event])) {
            $this->comportements[$event] = [];
        }

        $this->comportements[$event][] = $comportement;
    }
}
