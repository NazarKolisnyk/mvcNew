<?php

class Contacts {
    public function __construct($routerRes, $currentUserInfo)
    {
        $this->title = __('Contacts');
        $this->roleNumber = $currentUserInfo['role'];

        if (is_readable('view/cache/contacts.txt')) {
            header('Location: ' . HOST . BASE_URL . 'cache/contacts');
            exit;
        }
        $homepage = file_get_contents('view/contacts/v_contacts.php');
        file_put_contents('view/cache/contacts.txt', $homepage);
    }

    public function toHtml(): void {
            include('view/base/v_header.php');
            include('view/base/v_content.php');
            include('view/contacts/v_contacts.php');
            include('view/base/v_footer.php');
    }
};

?>