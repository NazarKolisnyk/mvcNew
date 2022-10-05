<?php

class EditRole
{ 
    public function __construct($routerRes, $currentUserInfo)
    {  
        $dbRole = new DbRole();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Role');
        
        $this->users = $statistics->getConnect($connect, 'users');
        $this->roles = $statistics->getConnect($connect, 'roles');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        $this->routerRes = $routerRes;
        $this->error;
        
        if (!restrict('edit-role')) {    
        header('Location: ' . HOST . BASE_URL . 'errors/e404');
        exit;
        } 
        if (empty($this->validateErrors) and $_POST['type']) {
            switch ($_POST['roleName'] == '') {
                case true:
                    $role = 'user' . $_POST['type'];
                    break;
                default:
                $role = htmlspecialchars(trim($_POST['roleName']));
            }
            if ($_POST['type'] == NULL or $_POST['type'] <= 4 or !is_numeric($_POST['type']) or strlen($_POST['type']) > 19 or $_POST['type'] == $this->roleNumber) {
                $this->error = "This role cannot be changed";
                return;
            }
            switch ($_POST["id"]) {
                case NULL:
                    $permissions = 'message, add-message, access';
                    break;
                default:
                $permissions = htmlspecialchars(trim(implode(", ", $_POST['id'])));
            }
            
            $result = $dbRole->editRole($connect, $role, $permissions, $_POST['type']);
            $_SESSION['is_role_edited'] = $result;
            header('Location: ' . HOST . BASE_URL . 'role');
            exit;
        }
    }
    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/admin/v_edit_role.php');
        include('view/base/v_footer.php');
    }
}
