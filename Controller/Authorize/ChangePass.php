<?php

declare(strict_types=1);

use Model\Authorize\Authorize;

class ChangePass
{
    public string $title;
    private array $validateErrors = [];

    public function __construct()
    {
        $authorize = new Authorize();
        $connect = Connect::getConnect();
        $this->title = __('Change Password');
        $neededFieldsArray = ['new_password', 'new_password_repeat'];
        $fields = extractFields($_POST, $neededFieldsArray);
        $this->validateErrors = $_POST ? $authorize->updatePasswordValidate($fields) : [];
        $fields = extractFields($_POST, $neededFieldsArray);
        setcookie('reboot_code', null, -2147483647);
        
        if ($_POST && empty($this->validateErrors)) {
            $authorize->updatePassword($connect, $fields['new_password']);
            header('Location: ' . HOST . BASE_URL . 'login');
            exit;
        }
    }

    public function toHtml(): void 
    {
include('view/base/v_header.php');
include('view/base/v_content.php');
include('view/authorize/v_change_pass.php');
include('view/base/v_footer.php');
    }
}
?>