<?php

declare(strict_types=1);

class DbPage
{
    public function setPages($connect, string $url, string $name, string $content) : bool {
        $queryString = sprintf("INSERT into pages VALUES (null, '%s', '%s', '%s')", $url, $name, $content);
        $result = mysqli_query($connect, $queryString) or die(mysqli_error($connect));
        return is_bool($result)? $result : false;
    }

    public function editPage($connect, string $name, string $content, int $id) : bool {
        $queryString = sprintf("UPDATE pages SET name = '%s', content = '%s' WHERE id = %s", $name, $content, $id);
        $result = mysqli_query($connect, $queryString);
        return $result ?? [];
    }

    public function deletePage($connect, int $id) : bool {
        $queryString = sprintf("DELETE FROM pages WHERE id = %s", $id);
        $result = mysqli_query($connect, $queryString);
        return $result ?? [];
    }
}
