<?php

class Contacts {
    public function __construct($routerRes, $currentUserInfo)
    {
        $this->title = __('Contacts');
        $this->roleNumber = $currentUserInfo['role'];
    }

    public function toHtml(): void {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/contacts/v_contacts.php');
        include('view/base/v_footer.php');
    }

};

?>