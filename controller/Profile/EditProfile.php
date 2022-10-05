<?php

class EditProfile
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Statements');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        
        if (!restrict('access')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        if($_POST['type']) {
            $name = $this->userName;
            $id = $this->roleNumber;
            $role = htmlspecialchars(trim($_POST['role']));
            $argument = htmlspecialchars(trim($_POST['argument']));
            if ($role == NULL or $role == 1 or $role <= 0 or strlen($role) > 19) {
                $this->error = "This role cannot be received";
                return;
            }
            $result = $statistics->setStatement($connect, $name, $id, $role, $argument);
            $_SESSION['is_user_edited'] = $result;
            header('Location: ' . HOST . BASE_URL . 'profile');
            exit;
        }
    }
    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/profile/v_edit.php');
        include('view/base/v_footer.php');
    }
}
?>