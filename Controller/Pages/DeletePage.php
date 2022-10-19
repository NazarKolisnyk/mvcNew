<?php

use Model\DbPage\DbPage;
use Model\Statistics\Statistics;

class DeletePage {

    public string $title;
    public $roleNumber;
    public array $users;
    public array $pages;
    public string $error;

    public function __construct($routerRes, $currentUserInfo)
    {
        $pages = new DbPage();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        $this->title = __('Page');
        
        $this->pages = $statistics->getConnect($connect, "pages");
        $this->roleNumber = $currentUserInfo['role'];
        $success = 0;

        if (!restrict('delete-page')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
        if ($_POST['delete_page']) {
            foreach ($this->pages as $page) {
                if ($_POST['delete_page'] == $page['id']) {
                    $success = 1;
                }
            }
            if ($success == 0) {
                return $this->error = "This message cannot be changed";
            }
            $success = 0;
            $result = $pages->deletePage($connect, $_POST['delete_page']);
            $_SESSION['is_page_deleted'] = $result;
            header('Location: ' . HOST . BASE_URL . 'pages');
            exit;
        }
    }

    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/pages/v_delete_page.php');
        include('view/base/v_footer.php');
    }
}