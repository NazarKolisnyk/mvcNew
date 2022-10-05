<?php
class ForgotPassConfirm 
{
    private $validateErrors = [];
    public function __construct()
    {
        $this->title = __('Forgot Password');
        $rebootCodeCookie = $_COOKIE['reboot_code']; 
        $rebootCodeValue = $_POST['reboot_code'];

        if($_POST['confirm'] && $rebootCodeValue == $rebootCodeCookie){
            header('Location: ' . HOST . BASE_URL . 'change_pass');
            exit;
        } elseif ($_POST['confirm'] && $rebootCodeValue !== $rebootCodeCookie) {
            $this->validateErrors[] = 'Wrong Reboot Code';
        }
    }
    public function toHtml(): void 
    {
include('view/base/v_header.php');
include('view/base/v_content.php');
include('view/authorize/v_forgot_pass_confirm.php');
include('view/base/v_footer.php');
    }
}
?>