<?php
class Statements
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $authorize = new Authorize();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Role');

        $this->users = $statistics->getConnect($connect, 'users');
        $this->roles = $statistics->getConnect($connect, 'roles');
        $this->statements = $statistics->getConnect($connect, 'statements');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        $success = 0;

        if (!restrict('access')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        if ($_POST['edit']) {
            foreach ($this->roles as $role) {
                if ($role['id'] == $_POST['role'] and $_POST['role'] != 1 and $_POST['role'] != $this->roleNumber) {
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "This role cannot be granted";
            }
            $success = 0;
            if ($_POST['edit'] == NULL) {
                return $this->error = "You have not selected a user";
            }
            foreach ($this->users as $user) {
                if ($user['id'] == $_POST['edit']) {
                    if ($user['role'] == $this->roleNumber or $user['role'] == 1) {
                        return $this->error = "You cannot change the role of user with number " . $_POST['edit'];
                    } else {
                        $result = $authorize->editUser($connect, $_POST['role'], $_POST['edit']);
                        $success = 1;
                    }
                }
            }
            if ($success == 0) {
                return $this->error = "User with number " . $_POST['edit'] . " doesn't exist";
            }
            foreach ($this->statements as $statement) {
                if ($statement['user_id'] == $_POST['edit'] and $statement['new_role_id'] == $_POST['role']) {
                    $statistics->editStatement($connect, 1,  $statement['id']);
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "You cannot change the role of user" . $_POST['edit'];
            }
            $success == 0;

            $_SESSION['is_user_edited'] = $result;
            header('Location: ' . HOST . BASE_URL . "users");
        }

        if ($_POST['сancel']) {
            foreach ($this->statements as $statement) {
                if ($statement['id'] == $_POST['сancel']) {
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "You cannot reply to message number" . $_POST['сancel'];
            }
            $success = 0;
            $statistics->editStatement($connect, 2,  $_POST['сancel']);

            header('Location: ' . HOST . BASE_URL . "statements");
        }
    }
    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/admin/v_statements.php');
        include('view/base/v_footer.php');
    }
}
