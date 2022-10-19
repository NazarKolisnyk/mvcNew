<?php
declare(strict_types=1);

namespace Model\Messages;

class Messages
{
    
    public function getMessage($connect, $id) : array {
        $queryString = sprintf("SELECT * FROM messages WHERE id = %s", $id);
        $result_arr = mysqli_fetch_assoc(mysqli_query($connect, $queryString));
        return $result_arr ?? [];
    }
    
    public function setMessage($connect, $fields) : bool {
        $queryString = sprintf("INSERT into messages VALUES (null, '%s', '%s', '%s', now(), '0')", $fields['name'], $fields['title'], $fields['content']);
        $result = mysqli_query($connect, $queryString) or die(mysqli_error($connect));
        return is_bool($result)? $result : false;
    }
    
    public function deleteMessage($connect, int $id) : bool {
        $queryString = sprintf("DELETE FROM messages WHERE id = %s", $id);
        $result = mysqli_query($connect, $queryString);
        return $result ?? [];
    }
    
    public function editMessage($connect, string $title, string $message, int $id) : bool {
        $queryString = sprintf("UPDATE messages SET title = '%s', message = '%s', status = '%s' WHERE id = %s", $title, $message, 1, $id);
        $result = mysqli_query($connect, $queryString);
        return $result ?? [];
    }
    
    public function messagesValidate(array &$fields, $currentUserInfo) : array{
        $this->userName = $currentUserInfo['username'];
        $errors = [];
        $titleLen = mb_strlen($fields['title'], 'UTF-8');
        
        if(mb_strlen($fields['content'], 'UTF-8') < 2){
            $errors[] = __('Message length must be not less then 2 characters!');
        }
        if($titleLen < 3 || $titleLen > 140){
            $errors[] = __('Title must be from 3 to 140 chars!');
        }
        $fields['name'] = $this->userName;
        $fields['title'] = htmlspecialchars(trim($fields['title']));
        $fields['content'] = htmlspecialchars(trim($fields['content']));
        
        return $errors;
    }
}