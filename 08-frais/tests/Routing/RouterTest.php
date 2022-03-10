<?php

use App\Http\Request;
use App\Routing\Route;
use App\Routing\Router;
use App\User\Register;
use App\User\RegisterForm;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function test_it_can_create_easy_routes()
    {
        $router = new Router;

        $router
            ->post('/register/save', Register::class)
            ->get('/register', RegisterForm::class);

        $result = $router->match(new Request("/register/save", "POST"));
        $this->assertEquals($result, Register::class);

        $result = $router->match(new Request("/register"));
        $this->assertEquals($result, RegisterForm::class);
    }

    public function test_it_can_add_and_find_routes()
    {
        // Given (situation)
        $router = new Router;

        // When (action)
        $router->addRoute(new Route("/", "MaClasse"))
            ->addRoute(new Route("/toto", "MaClasse2"));

        // Then (vérification)
        $this->assertEquals("MaClasse", $router->match(new Request("/")));
        $this->assertEquals("MaClasse2", $router->match(new Request("/toto")));
    }

    public function test_it_throws_exception_if_no_route_found()
    {
        $router = new Router;

        $this->expectException(Exception::class);

        $router->match(new Request("/"));
    }
}
