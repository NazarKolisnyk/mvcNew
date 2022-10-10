<?php

class E404 {
    public function __construct($routerRes, $currentUserInfo)
    {   
        $this->title = __('Error 404');
        $this->roleNumber = $currentUserInfo['role'];
        if (is_readable('view/cache/error.txt')) {
            header('Location: ' . HOST . BASE_URL . 'cache/error');
            exit;
        }
        $homepage = file_get_contents('view/errors/v_404.php');
        file_put_contents('view/cache/error.txt', $homepage);
    }

    public function toHtml(): void {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/errors/v_404.php');
        include('view/base/v_footer.php');
    }

}
