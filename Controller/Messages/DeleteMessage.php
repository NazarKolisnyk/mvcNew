<?php

declare(strict_types=1);


use Model\Messages\Messages;
use Model\Statistics\Statistics;

class DeleteMessage {

    public function __construct($routerRes, $currentUserInfo)
    {
        $messages = new Messages();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Message');
        
        $this->messages = $statistics->getConnect($connect, "messages");
        $this->roleNumber = $currentUserInfo['role'];
        $this->routerRes = $routerRes;
        $this->error;
        
        if (!restrict('delete-message')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        if ($_POST['delete_message']) {
            foreach ($this->messages as $message) {
                if ($_POST['edit_message'] == $message) {
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "This message cannot be changed";
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