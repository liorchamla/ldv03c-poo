<?php

class ManageNews
{

    public function __construct(Log $log, string $title)
    {
        $date = new DateTime();

        $log->addLog($date->format('d/m/Y H:i:s'));
    }
}
