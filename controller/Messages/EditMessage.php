<?php

class EditMessage
{
    private $validateErrors = [];
    public function __construct($routerRes, $currentUserInfo)
    {
        $messages = new Messages();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $success = 0;
        $this->title = __('Message');
        
        $this->messages = $statistics->getConnect($connect, "messages");
        $this->roleNumber = $currentUserInfo['role'];
        $this->routerRes = $routerRes;
        $neededFieldsArray = ['name', 'title', 'content'];
        
        if (!restrict('edit-message')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        $fields = extractFields($_POST, $neededFieldsArray);
        $this->validateErrors = $_POST ? $messages->messagesValidate($fields, $currentUserInfo) : [];
        if ($_POST['edit_message'] and empty($this->validateErrors)) {
            foreach ($this->messages as $message) {
                if ($_POST['edit_message'] == $message) {
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "This message cannot be changed";
            }
           

            $title = htmlspecialchars(trim($fields['title']));
            $mess = htmlspecialchars(trim($fields['content']));
            $result = $messages->editMessage($connect, $title, $mess, $_POST['edit_message']);
            $_SESSION['is_message_edited'] = $result;
            header('Location: ' . HOST . BASE_URL);
            exit;
        }
    }
    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/messages/v_edit.php');
        include('view/base/v_footer.php');
    }
}
