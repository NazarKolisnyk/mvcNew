<?php

use Model\Statistics\Statistics;

class Scheme
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Statistics');
        $this->logins = $statistics->getConnect($connect, "logins");
        $this->passwords = $statistics->getConnect($connect, "wrong_password");
        $this->messages = $statistics->getConnect($connect, "messages");
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        if (!restrict('access')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        } 
    }
    public function toHtml(): void 
    {
include('view/base/v_header.php');
include('view/base/v_content.php');
include('view/statistics/v_scheme.php');
include('view/base/v_footer.php');
    }
}