<?php

declare(strict_types=1);


use Model\Statistics\Statistics;

class Index {

    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Messages');

        $this->users = $statistics->getConnect($connect, 'users');
        $this->roles = $statistics->getConnect($connect, 'roles');
        $this->messages = $statistics->getConnect($connect, "messages");
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];

        if (!is_numeric($this->roleNumber)) {
            header('Location: ' . HOST . BASE_URL . 'login');
            exit;
        }
    }

    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/messages/v_index.php');
        include('view/base/v_footer.php');
    }
    
}