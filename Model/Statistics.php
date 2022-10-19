<?php

declare(strict_types=1);

namespace Model\Statistics;

class Statistics
{
    public function getConnect($connect, $table) : array {
        $queryString = "SELECT * FROM $table WHERE 1";
        $result_arr = mysqli_fetch_all(mysqli_query($connect, $queryString), MYSQLI_ASSOC);
        return $result_arr ?? [];
    }

    public function setStatistics($connect, $login, $table) : bool {
        $queryString = sprintf("INSERT into $table VALUES (null, '%s',  now())", $login);
        $result = mysqli_query($connect, $queryString) or die(mysqli_error($connect));
        return is_bool($result);
    }

    public function setStatement($connect, $name, $id, $role, $argument) : bool {
        $queryString = sprintf("INSERT into statements VALUES (null, '%s', '%s', '%s', '%s', '0')", $name, $id, $role, $argument);
        $result = mysqli_query($connect, $queryString) or die(mysqli_error($connect));
        return is_bool($result);
    }

    public function editStatement($connect, int $status, $id) : bool {
        $queryString = sprintf("UPDATE statements SET status = '%s' WHERE id = %s", $status, $id);
        $result = mysqli_query($connect, $queryString);
        return is_bool($result);
    }
}
