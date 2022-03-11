<?php

namespace App\Renderer;

class Renderer implements RendererInterface
{
    public function __construct(private string $folderPath)
    {
    }

    public function render(string $file, array $data = []): string
    {
        extract($data);

        ob_start();
        include "$this->folderPath/$file.html.php";
        $html = ob_get_clean();

        return $html;
    }
}
