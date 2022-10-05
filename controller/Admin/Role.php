<?php
class Role 
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Role');

        $this->roles = $statistics->getConnect($connect, 'roles');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        
        if (!restrict('role')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
    }
    public function toHtml(): void 
    {
include('view/base/v_header.php');
include('view/base/v_content.php');
include('view/admin/v_role.php');
include('view/base/v_footer.php');
    }
}
?>