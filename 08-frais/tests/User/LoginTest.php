<?php

use App\Http\Request;
use App\User\Action\Login;
use App\User\Service\PasswordHash;
use App\User\User;
use App\User\UserRepository;
use PHPUnit\Framework\TestCase;
use Tests\User\InMemoryUserRepository;

class LoginTest extends TestCase
{
    public function test_we_can_login()
    {
        // Given someone has submitted the form
        $request = new Request("/", "POST", [
            'email' => "lior@mail.com",
            'password' => "password"
        ]);

        // And he has an account in the database
        $passwordHasher = new PasswordHash;
        $hash = $passwordHasher->hash("password");

        $userRepository = new InMemoryUserRepository;
        $userRepository->save(new User("Lior", "Chamla", "lior@mail.com", $hash));

        $controller = new Login($passwordHasher, $userRepository);

        // When
        $response = $controller($request);

        // Then
        $this->assertEquals(301, $response->statusCode);
        $this->assertEquals("/", $response->headers['Location']);
        $this->assertArrayHasKey('user', $_SESSION);
    }
}
