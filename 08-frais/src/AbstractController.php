<?php

namespace App;

abstract class AbstractController
{
    protected function render(string $file)
    {
        ob_start();
        include __DIR__ . "/../templates/$file.html.php";
        $html = ob_get_clean();

        return $html;
    }
}
