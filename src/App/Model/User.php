<?php

namespace Bank\Green\Model;

class User
{
    private string $cpf;
    private string $nome;
    private string $senha;
    private string $email;

    public function __construct(string $cpf, string $nome, string $senha, string $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}