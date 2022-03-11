<?php

namespace App\Renderer;

interface RendererInterface
{
    public function render(string $file, array $data = []): string;
}
