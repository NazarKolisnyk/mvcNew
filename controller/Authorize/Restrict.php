<?php

    $currentUserInfo = (array) json_decode($_COOKIE['user_info']);
    $statistics = new Statistics();
    $connect = Connect::getConnect();
    
    $roleNumber = $currentUserInfo['role'];
    $roles = $statistics->getConnect($connect, 'roles');
    
    function restrict($permission) {
        global $roles, $roleNumber;
        foreach ($roles as $role) {
            if ($roleNumber == $role['id']) {
                $arr = explode(", ", $role['permission']);
            }
        }
    return in_array($permission, $arr);
    }
    
    

