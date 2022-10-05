<?php
class NewPage
{
    public function __construct($routerRes, $currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        
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
        foreach ($this->pages as $page) {
            if ($page['url'] == $_GET['mvcsystemurl']) {
                $include = true;
                break;
            }
        }
        if ($include == true) {
                include('view/pages/v_new_page.php');
            } else {
                include_once('view/errors/v_404.php');
            }
        include('view/base/v_footer.php');
    }
}
