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
        if($_POST['type']) {
            $name = $this->userName;
            $id = $this->roleNumber;
            $argument = htmlspecialchars(trim($_POST['argument']));
            foreach ($this->roles as $role) {
                if ($role['id'] == $_POST['role'] and $_POST['role'] != 1 and $_POST['role'] != $this->roleNumber) {
                    $result = $statistics->setStatement($connect, $name, $id, $role['id'], $argument);
            $_SESSION['is_user_edited'] = $result;
            header('Location: ' . HOST . BASE_URL . 'profile');
            exit;
                }
                $this->error = "This role cannot be received";
            }
            
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