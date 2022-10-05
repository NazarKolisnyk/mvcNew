<?php
class Pages 
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Pages');
        
        $this->users = $statistics->getConnect($connect, 'users');
        $this->pages = $statistics->getConnect($connect, 'pages');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        
        if (!restrict('pages')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        } 
    }
    public function toHtml(): void 
    {
include('view/base/v_header.php');
include('view/base/v_content.php');
include('view/pages/v_pages.php');
include('view/base/v_footer.php');
    }
}
?>
