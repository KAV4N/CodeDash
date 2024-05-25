<?php

namespace Src;

class ValidationController {
    private $minPasswordLen = 8;
    private $minUsernameLen = 3;

    public function validateUsername($username) {
        if (!empty($username) && strlen($username) >= $this->minUsernameLen && !preg_match('/\s/', $username)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validatePasswordStrength($password) {
        if (strlen($password) >= $this->minPasswordLen && !preg_match('/\s/', $password) && !empty($password)) {
            return true;
        } else {
            return false;
        }
    }

    public function isNewPassword($currentPassword, $confirmPassword, $newPassword) {
        if (!empty($currentPassword) || !empty($confirmPassword) || !empty($newPassword)) {
            return true;
        }
        return false;
    }

    public function validatePasswords($playerPassword, $currentPassword, $newPassword, $confirmPassword) {
        if (!isset($_SESSION["user_id"])) {
            return false; 
        }

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            return false; 
        }

        if (!password_verify($currentPassword, $playerPassword)) {
            return false;
        }

        if (!$this->validatePasswordStrength($newPassword)) {
            return false; 
        }

        if ($newPassword != $confirmPassword) {
            return false;
        }

        return true;
    }
}
