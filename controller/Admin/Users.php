<?php
class Users
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $authorize = new Authorize();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Users');
        $this->users = $statistics->getConnect($connect, 'users');
        $this->roles = $statistics->getConnect($connect, 'roles');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        $this->error;
        $success = 0;
        
        if (!restrict('users')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        if (empty($this->validateErrors) and $_POST['type']) {
            foreach ($this->roles as $role) {
                if ($role['id'] == $_POST['role'] and $_POST['role'] != 1 and $_POST['role'] != $this->roleNumber) {
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "This role cannot be granted";
            }
            $success = 0;
            if ($_POST['id'] == NULL) {
                return $this->error = "You have not selected a user";
            }
            foreach ($_POST['id'] as $value) {
                foreach ($this->users as $user) {
                    if ($user['id'] == $value) {
                        if ($user['role'] == $this->roleNumber or $user['role'] == 1) {
                            return $this->error = "You cannot change the role of user with number " . $value;
                        } else {
                            $result = $authorize->editUser($connect, $_POST['role'], $value);
                            $success = 1;
                        }
                    }
                }
                if ($success == 0) {
                    return $this->error = "User with number " . $value . " doesn't exist";
                }
                $success = 0;
            }
            $_SESSION['is_user_edited'] = $result;
            header('Location: ' . HOST . BASE_URL . "users");
        }
    }
    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/admin/v_users.php');
        include('view/base/v_footer.php');
    }
}
