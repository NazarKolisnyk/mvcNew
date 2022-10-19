<?php

declare(strict_types=1);

namespace Model\DbRole;

class DbRole
{
    public function setRoles($connect, $role, $permissions) : bool {
        $queryString = sprintf("INSERT into roles VALUES (null, '%s', '%s')", $role, $permissions);
        $result = mysqli_query($connect, $queryString) or die(mysqli_error($connect));
        return is_bool($result)? $result : false;
    }

    public function editRole($connect, string $role, string $permission, int $id) : bool {
        $queryString = sprintf("UPDATE roles SET role = '%s', permission = '%s' WHERE id = %s", $role, $permission, $id);
        $result = mysqli_query($connect, $queryString);
        return $result ?? [];
    }
}
