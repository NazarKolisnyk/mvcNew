<?php

declare(strict_types=1);

use Model\Authorize\Authorize;

class ForgotPass
{
    public string $title;
    private array $validateErrors;

    public function __construct()
    {
        $authorize = new Authorize();
        $connect = Connect::getConnect();
        $this->title = __('Forgot Password');

        $neededFieldsArray = ['username', 'email'];
        $fields = extractFields($_POST, $neededFieldsArray);
        $this->validateErrors = $_POST ? $authorize->rebootUserCheckExist($connect, $fields) : [];
        $fields = extractFields($_POST, $neededFieldsArray);

        if($_POST['get_code'] && empty($this->validateErrors)) {
            $_SESSION['username_change_pass'] = $fields['username'];
            $rebootCode = $authorize->generateRebootCode();
            $authorize->sendRebootCode($fields, $rebootCode);
            header('Location: ' . HOST . BASE_URL . 'forgot_pass_confirm');
            exit;
        }
    }

    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/authorize/v_forgot_pass.php');
        include('view/base/v_footer.php');
    }
}
?>