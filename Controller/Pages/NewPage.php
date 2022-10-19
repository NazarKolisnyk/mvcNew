<?php

use Model\Statistics\Statistics;

class NewPage
{

    public string $title;
    public $userName;
    public $roleNumber;
    public array $users;
    public array $pages;
    private bool $include = false;
    protected $page;

    public function __construct($currentUserInfo)
    {
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        
        $this->users = $statistics->getConnect($connect, 'users');
        $this->pages = $statistics->getConnect($connect, 'pages');
        $this->roleNumber = $currentUserInfo['role'];
        $this->userName = $currentUserInfo['username'];
        foreach ($this->pages as $this->page) {
            if ($this->page['url'] == $_GET['mvcsystemurl']) {
                $this->include = true;
                break;
            }
        }
        
        if (!$this->include or !restrict('pages')) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }

    }
    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/pages/v_new_page.php');
        include('view/base/v_footer.php');
    }
}
