<?php

class E404 {
    public function __construct($routerRes, $currentUserInfo)
    {   
        $this->title = __('Error 404');
        $this->roleNumber = $currentUserInfo['role'];
    }

    public function toHtml(): void {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/errors/v_404.php');
        include('view/base/v_footer.php');
    }

}
