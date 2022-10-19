<?php

class Cache
{
    public string $title;
    public $roleNumber;
    private string $filename;

    public function __construct($routerRes, $currentUserInfo)
    {
        $this->title = __('Cache');
        $this->roleNumber = $currentUserInfo['role'];
        $cache_hours = 24;
        $this->filename = 'view' . '/' . $_GET['mvcsystemurl'] . '.txt';

        if (!is_readable($this->filename)) {
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }

        if (((time() - filemtime($this->filename)) / 3600) > $cache_hours) {
            unlink($this->filename);
            header('Location: ' . HOST . BASE_URL . 'errors/e404');
            exit;
        }
    }

    public function toHtml(): void
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include($this->filename);
        include('view/base/v_footer.php');
    }
}
