<?php

use Model\DbPage\DbPage;
use Model\Statistics\Statistics;

class EditPage {

    public string $title;
    public $userName;
    public $roleNumber;
    public array $users;
    public array $pages;
    public string $error;
    private array $routerRes;

    public function __construct($routerRes, $currentUserInfo)
    {  

        $this->title = __('Page');
        $dbPage = new DbPage();
        $statistics = new Statistics();
        $connect = Connect::getConnect();

        $this->users = $statistics->getConnect($connect, 'users');
        $this->pages = $statistics->getConnect($connect, 'pages');
        $this->userName = $currentUserInfo['username'];
        $this->roleNumber = $currentUserInfo['role'];
        $this->routerRes = $routerRes;
        $this->error = '';

        $id = $this->routerRes['params']['id'];
        $name = $_POST['pageName'];
        $content = $_POST['content'];

        if (!restrict('edit-page')) {    
        header('Location: ' . HOST . BASE_URL . 'errors/e404');
        exit;
        } 
        if (empty($this->validateErrors) and count($_POST)) {
            if ($name == "" or $content == "") {
                return $this->error = "Fill in all fields";
            }
            foreach ($this->pages as $page)
            if ($page['id'] == $id) {
                $result = $dbPage->editPage($connect, $name, $content, $id);
                $_SESSION['is_page_edited'] = $result;
                header('Location: ' . HOST . BASE_URL);
                exit;
            }
            return $this->error = "You cannot change this page";
        }
    }

    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/pages/v_edit_page.php');
        include('view/base/v_footer.php');
    }
}