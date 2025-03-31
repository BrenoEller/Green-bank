<?php

namespace Bank\Green\App\Repositories;

use Bank\Green\Model\User;

class UserRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): bool
    {
        $sql = "INSERT INTO users (cpf, nome, senha, email) VALUES (:cpf, :nome, :senha, :email)";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':cpf' => $user->getCpf(),
            ':nome' => $user->getNome(),
            ':senha' => $user->getSenha(),
            ':email' => $user->getEmail(),
        ]);
    }

    public function findByCpf(string $cpf): ?User
    {
        $sql = "SELECT * FROM users WHERE cpf = :cpf";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':cpf' => $cpf]);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data['cpf'], $data['nome'], $data['senha'], $data['email']);
        }

        return null;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connection->query($sql);

        $users = [];
        while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data['cpf'], $data['nome'], $data['senha'], $data['email']);
        }

        return $users;
    }

    public function deleteByCpf(string $cpf): bool
    {
        $sql = "DELETE FROM users WHERE cpf = :cpf";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([':cpf' => $cpf]);
    }
}