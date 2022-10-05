<?php
class Logout 
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $this->roleNumber = $currentUserInfo['role'];
        $title = __('Log Out');
        if ($_POST['logout']) {
            setcookie('user_info', null, -2147483647, BASE_URL, DB_HOST);
            header('Location: ' . HOST . BASE_URL);
            exit;
        }
    }
    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/authorize/v_logout.php');
        include('view/base/v_footer.php');
    }
}
