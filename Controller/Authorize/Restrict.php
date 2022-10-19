<?php

declare(strict_types=1);


use Model\Statistics\Statistics;

if ($_COOKIE['user_info']) {
    $currentUserInfo = (array) json_decode($_COOKIE['user_info']);
}

$statistics = new Statistics();
$connect = Connect::getConnect();
    
$roleNumber = $currentUserInfo['role'];
$roles = $statistics->getConnect($connect, 'roles');
    
function restrict($permission): bool
{
    global $roles, $roleNumber;
    foreach ($roles as $role) {
        if ($roleNumber == $role['id']) {
            $arr = explode(", ", $role['permission']);
        }
    }return in_array($permission, $arr);
}
    
    

