<?php

class User
{
    private $id;
    private $login;
    private $status;
    private $last_login;
    private $password;

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLastLogin()
    {
        return $this->last_login;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
