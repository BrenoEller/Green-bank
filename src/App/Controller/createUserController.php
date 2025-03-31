<?php

namespace Bank\Green\Controller;

use Bank\Green\Model\User;

class CreateUserController
{
    public function createUser(array $data): User
    {
        if (empty($data['cpf']) || empty($data['nome']) || empty($data['senha']) || empty($data['email'])) {
            throw new \InvalidArgumentException("Todos os campos são obrigatórios.");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("O email fornecido é inválido.");
        }

        $user = new User(
            $data['cpf'],
            $data['nome'],
            password_hash($data['senha'], PASSWORD_ARGON2ID),
            $data['email']
        );

        return $user;
    }
}