<?php

declare(strict_types=1);

use Model\Authorize\Authorize;

class Register
{
    public string $title;
    private array $validateErrors;
    public array $registeredUserErrors;

    public function __construct() 
    {
        $authorize = new Authorize();
        $connect = Connect::getConnect();
        $this->title = __('Register');
        $neededFieldsArray = ['username', 'email', 'password', 'repeat_pass'];

        $fields = extractFields($_POST, $neededFieldsArray);
        $this->validateErrors = $_POST ? $authorize->registerValidate($fields) : [];
        if(empty($this->validateErrors) and count($_POST)) {
            $registered = $authorize->registerUser($connect, $fields);
            $this->registeredUserErrors = $registered;
            if (!$registered) {
                $_SESSION['is_user_exists'] = $registered;
                header('Location: ' . HOST . BASE_URL . 'login');
                exit;
            }
        }
    }


    public function toHtml(): void 
    {
include('view/base/v_header.php');
include('view/base/v_content.php');
include('view/authorize/v_register.php');
include('view/base/v_footer.php');
    }
}
?>