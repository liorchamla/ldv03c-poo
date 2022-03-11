<?php

namespace App\Expense\Action;

use App\Http\Response;
use App\Renderer\Renderer;
use App\Renderer\RendererInterface;

class ExpenseForm
{
    public function __construct(private RendererInterface $renderer)
    {
    }

    public function __invoke()
    {
        $html = $this->renderer->render("expense/form");

        return new Response($html);
    }
}
