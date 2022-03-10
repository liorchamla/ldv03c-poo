<?php

namespace App\User;

use PDO;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findOneByEmail(string $email): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");

        $query->execute([
            "email" => $email
        ]);

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $user = new User($data['first_name'], $data['last_name'], $data['email'], $data['password']);
        return $user;
    }

    public function save(User $user)
    {
        $query = $this->pdo->prepare('
            INSERT INTO users 
            (first_name, last_name, email, password)
            VALUES
            (:firstName, :lastName, :email, :password)
        ');

        $query->execute([
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => $user->email,
            'password' => $user->password
        ]);
    }
}
