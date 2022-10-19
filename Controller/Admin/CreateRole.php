<?php

declare(strict_types=1);


use Model\DbRole\DbRole;
use Model\Statistics\Statistics;

class CreateRole {

    public string $title;
    public $roleNumber;
    public $userName;
    public array $users;
    public array $roles;
    private array $validateErrors = [];

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

        $role = $_POST['roleName'];
        $permissions = implode(", ", array_slice($_POST, 1));

        if (!restrict('add-role')) {
        header('Location: ' . HOST . BASE_URL . 'errors/e404');
        exit;
        } 
    
        if(empty($this->validateErrors) and count($_POST)) {
        $result = $dbRole->setRoles($connect, $role, $permissions);
        $_SESSION['is_role_added'] = $result;
        header('Location: ' . HOST . BASE_URL . 'role');
        exit;
        }
    }
    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/admin/v_create_role.php');
        include('view/base/v_footer.php');
    }
}