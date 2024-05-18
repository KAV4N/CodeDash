<?php

class PlayerDashboardDto {
    public $id;
    public $email;
    public $username;
    public $isBanned;

    public $isAdmin;

    public function __construct(
        $id,
        $email,
        $username,
        $isBanned,
        $isAdmin
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->isBanned = $isBanned;
        $this->isAdmin = $isAdmin;
    }
}