<?php

declare(strict_types=1);


use Model\Messages\Messages;

class AddMessage {
    private $validateErrors = [];

    public function __construct($routerRes, $currentUserInfo)
    {
        $this->title = __('Message');
        $messages = new Messages();
        $connect = Connect::getConnect();

        $this->roleNumber = $currentUserInfo['role'];
        $neededFieldsArray = ['name', 'title', 'content'];
        $fields = extractFields($_POST, $neededFieldsArray);
        $this->validateErrors = $_POST ? $messages->messagesValidate($fields, $currentUserInfo):[];
        
        if (!restrict('add-message')) {
        header('Location: ' . HOST . BASE_URL . 'errors/e404');
        exit;
        } 
        if(empty($this->validateErrors) and count($_POST)) {
        $result = $messages->setMessage($connect, $fields);
        $_SESSION['is_message_added'] = $result;
        header('Location: ' . HOST . BASE_URL);
        exit;
        }
    }
    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/messages/v_add.php');
        include('view/base/v_footer.php');
    }
}