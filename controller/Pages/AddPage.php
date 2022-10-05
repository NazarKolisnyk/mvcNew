<?php

class AddPage {
    private $validateErrors = [];

    public function __construct($routerRes, $currentUserInfo)
    {
        $this->title = __('Page');
        $dbPage = new DbPage();
        $statistics = new Statistics();
        $connect = Connect::getConnect();

        $this->users = $statistics->getConnect($connect, 'users');
        $this->pages = $statistics->getConnect($connect, 'pages');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];

        $page = $_POST['pageName'];
        $content = $_POST['content'];
        $name = $_POST['pageUrl'];
        if (!restrict('add-page')) {
        header('Location: ' . HOST . BASE_URL . 'errors/e404');
        exit;
        } 
    
        if(empty($this->validateErrors) and count($_POST)) {
        $result = $dbPage->setPages($connect, $name, $page, $content);
        $_SESSION['is_page_added'] = $result;
        header('Location: ' . HOST . BASE_URL);
        exit;
        }
    }
    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/pages/v_add_page.php');
        include('view/base/v_footer.php');
    }
}