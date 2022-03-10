<?php

namespace App\User\Action;

use App\Http\Response;

class Export
{
    public function __invoke(): Response
    {
        $json = json_encode(["id" => 12, "firstName" => "Lior", "name" => "Chamla"]);

        $response = new Response($json, 200, [
            "Content-Type" => "application/json"
        ]);

        return $response;
        // header("Content-Type: application/json");
        // return json_encode(["id" => 12, "firstName" => "Lior", "name" => "Chamla"]);
    }
}
