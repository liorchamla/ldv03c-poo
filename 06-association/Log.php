<?php

class Log
{
    private array $storage = [];
    private  int $count = 0;

    public  function getStorage(): array
    {
        return $this->storage;
    }

    public  function addLog(string $date)
    {
        $this->storage[] = $date;
    }
}
