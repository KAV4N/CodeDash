<?php

namespace Model\Dto;

class AccountDataDto {

    
    public $email;
    public $username;
    public $password;
    public $aboutme;


    public function __construct(
        $email,
        $username,
        $password,
        $aboutme
    ) {
        $this->username = $username;
        $this->aboutme = $aboutme;
        $this->email = $email;
        $this->password = $password;
    }
}