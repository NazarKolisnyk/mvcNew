<?php

class DeleteMessage {
    private $routerRes = '';    

    public function __construct($routerRes, $currentUserInfo)
    {
        $messages = new Messages();
        $connect = Connect::getConnect();
        $this->title = __('Message');
        
        $this->roleNumber = $currentUserInfo['role'];
        $this->routerRes = $routerRes;
        $this->error;
        
        if (!restrict('delete-message')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        if ($_POST['delete_message']) {
            if ($_POST['delete_message'] < 0 or !is_numeric($_POST['delete_message']) or strlen($_POST['delete_message']) > 19) {
                $this->error = "This message cannot be deleted";
                return;
            }
            $result = $messages->deleteMessage($connect, ($_POST['delete_message']));
            $_SESSION['is_message_deleted'] = $result;
            header('Location: ' . HOST . BASE_URL);
            exit;
        }
    }

    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/messages/v_delete.php');
        include('view/base/v_footer.php');
    }
}