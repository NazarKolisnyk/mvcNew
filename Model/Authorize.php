<?php

declare(strict_types=1);

namespace Model\Authorize;

use Model\Statistics\Statistics;

class Authorize
{    
    public function setUser($connect, $fields) : bool {
        $queryString = sprintf("INSERT into users VALUES (null, '%s', '%s', '%s', now(), '0')", $fields['email'], $fields['login'], $fields['password'], $fields['role']);
        $result = mysqli_query($connect, $queryString) or die(mysqli_error($connect));
        return is_bool($result);
    }
    
    public function deleteUser($connect, int $id) : bool {
        $queryString = sprintf("DELETE FROM users WHERE id = %s", $id);
        $result = mysqli_query($connect, $queryString);
        return is_bool($result);
    }
    
    public function editUser($connect, string $role, int $id) : bool {
        $queryString = sprintf("UPDATE users SET role = '%s' WHERE id = %s", $role, $id);
        $result = mysqli_query($connect, $queryString);
        return is_bool($result);
    }
    
    public function registerValidate(array &$fields) : array {
        $errors = [];
        $usernameLen = mb_strlen($fields['username'], 'UTF-8');
        $emailLen = mb_strlen($fields['email'], 'UTF-8');
        $passwordLen = mb_strlen($fields['password'], 'UTF-8');
    
        if($usernameLen < 3 || $usernameLen > 30) {
            $errors[] = __('Username be from 3 to 30 chars!');
        }
        if($emailLen < 5 || $emailLen > 40) {
            $errors[] = __('Enter correct email!');
        }   
        if($passwordLen < 5 || $passwordLen > 30) {
            $errors[] = __('Password be from 5 to 30 chars!');
        }
        if ($fields['new_password'] !== $fields['new_password_repeat']) {
            $errors[] = __('Passwords do not match!');
        }
        if($fields['password'] !== $fields['repeat_pass']) {
            $errors[] = __('Passwords do not match!');
        }
    
        $fields['username'] = htmlspecialchars(trim($fields['username']));
        $fields['email'] = htmlspecialchars(trim($fields['email']));
        $fields['password'] = htmlspecialchars(trim($fields['password']));

        if($fields['repeat_pass']) {
            $fields['repeat_pass'] = htmlspecialchars(trim($fields['repeat_pass']));
        } else {
            $fields['repeat_pass'] = htmlspecialchars(trim($fields['new_password_repeat']));
        }
        
        return $errors;
    }
    
    private function existUserErrors($userData, $fields) : array {
        $errors = [];
        if($userData['login'] == $fields['username']) {
            $errors[] = __('User with this username already exists');
        }
        if($userData['email'] == $fields['email']) {
            $errors[] = __('User with this email already exists');
        }
    
        return $errors ?? [];
    }
    
    public function registerUser($connect, array $fields): array {
        $errors = [];
        $queryString = sprintf("SELECT * FROM users WHERE login = '%s' OR email = '%s'",
            $fields['username'],
            $fields['email']
        );
        $userData = mysqli_fetch_assoc(mysqli_query($connect, $queryString));
        if (isset($userData)) {
            $errors = $this->existUserErrors($userData, $fields);
        }
        elseif($userData == null) {
            $queryString = sprintf("INSERT INTO users (email, login, password, role) VALUES ('%s', '%s', '%s', 3)",
                $fields['email'],
                $fields['username'],
                password_hash($fields['password'], PASSWORD_DEFAULT)
            );
            mysqli_query($connect, $queryString);
        };
        
        return $errors;
    }
    
    private function bindLoggedUser(array $userInfo, array $fields) {
        $rememberTime = $fields['remember_user'] == 'on' ? strtotime('+30 days') : 0;
        setcookie('user_info', json_encode($userInfo), $rememberTime);
    }
    
    private function fetchUserData($connect, array $fields) {
        $queryString = sprintf("SELECT * FROM users WHERE login = '%s'",
            $fields['username']
        );
        return mysqli_fetch_assoc(mysqli_query($connect, $queryString));
    }
    
    public function loginUser($connect, array $fields): array {
        $statistics = new Statistics();
        $database = "wrong_password";
        $userData = $this->fetchUserData($connect, $fields);
    
        if (!$userData) {
            $errors[] = __('User with this username does not exist');
        } else {
            $verifyPass = password_verify($fields['password'], $userData['password']);
            if (!$verifyPass) {
                $result = $statistics->setStatistics($connect, $_POST["username"], $database);
                $_SESSION['is_login_added'] = $result;
                $errors[] = __('Wrong Password');
            }
        };
    
        $loggedUserData = [
            'username' => $userData['login'],
            'email' => $userData['email'],
            'role' => $userData['role'],
        ];
    
        if(empty($errors)) {
            $this->bindLoggedUser($loggedUserData, $fields);
        }
    
        return $errors ?? [];
    } 
    
    public function rebootUserCheckExist($connect, array $fields) : array {
        $errors = [];
            $userData = $this->fetchUserData($connect, $fields);
        if (!$userData) {
            $errors[] = __('User with this username does not exist');
        } else {
            if($fields['email'] !== $userData['email']) {
                $errors[] = __('Wrong email');
            }
        }
        return $errors ?? [];
    }

    public function generateRebootCode(): string
    {
        $rebootCode = "";
        for ($i = 1; $i <= 6; $i++) {
            $rebootCode .= random_int(0, 9);
        }
        return $rebootCode;
    }
    
    public function sendRebootCode(array $fields, string $rebootCode) {
        $mail = $fields['email'];
        $title = "Hello, " . $fields['username'] . ", here is the password recovery code";
        $message = "The code itself: $rebootCode";
        $rebootCodeTime = strtotime('+10 minutes');
        
        mail($mail, $title, $message);
        setcookie('reboot_code', $rebootCode, $rebootCodeTime, BASE_URL, DB_HOST);
    }
    
    public function updatePasswordValidate($fields): array
    {
        $errors = [];
        $passwordLen = mb_strlen($fields['new_password'], 'UTF-8');
        
        if($passwordLen < 5 || $passwordLen > 30) {
            $errors[] = __('Password be from 5 to 30 chars!');
        }
        if ($fields['new_password'] !== $fields['new_password_repeat']) {
            $errors[] = __('Passwords do not match!');
        }
        $fields['password'] = htmlspecialchars(trim($fields['new_password']));
        $fields['repeat_pass'] = htmlspecialchars(trim($fields['new_password_repeat']));
    
        return $errors;
    }
    
    public function updatePassword($connect, $newPassword) {
        $username = $_SESSION['username_change_pass'];
        $queryString = sprintf("UPDATE users SET password = '%s' WHERE login = '%s'",
            password_hash($newPassword, PASSWORD_DEFAULT),
            htmlspecialchars(trim($username))
        );
        mysqli_query($connect, $queryString);
        $_SESSION['success_change_pass'] = true;
    }
}

