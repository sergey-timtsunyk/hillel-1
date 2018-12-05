<?php

class User
{
    private $id;
    private $login;
    private $status;
    private $last_login;

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
}
