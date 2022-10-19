<?php

declare(strict_types=1);


class Contacts {
    public string $title;
    public $roleNumber;

    public function __construct($routerRes, $currentUserInfo)
    {
        $this->title = __('Contacts');
        $this->roleNumber = $currentUserInfo['role'];

        if (is_readable('view/cache/contacts.txt')) {
            header('Location: ' . HOST . BASE_URL . 'cache/contacts');
            exit;
        }

    }

    public function toHtml(): void {
            include('view/base/v_header.php');
            include('view/base/v_content.php');
            include('view/contacts/v_contacts.php');
            include('view/base/v_footer.php');
    }
};
