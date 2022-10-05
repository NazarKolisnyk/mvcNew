<?php

class Profile {

    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Profile');
        
        $this->users = $statistics->getConnect($connect, 'users');
        $this->roles = $statistics->getConnect($connect, 'roles');
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
        include('view/profile/v_profile.php');
        include('view/base/v_footer.php');
    }
}