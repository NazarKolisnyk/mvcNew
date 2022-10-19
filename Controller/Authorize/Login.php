<?php

declare(strict_types=1);

use Model\Authorize\Authorize;
use Model\Statistics\Statistics;

class login
{
    public string $title;
    private array $loggedUserErrors = [];

    public function __construct()
    {
        $this->title = __('Chat List');
        $authorize = new Authorize();
        $statistics = new Statistics();
        $connect = Connect::getConnect();
        
        $neededFieldsArray = ['username', 'password', 'remember_user'];
        
        $fields = extractFields($_POST, $neededFieldsArray);
        $database = "logins";
        
        if(isset($_POST['login'])) {
            $loggedErrors = $authorize->loginUser($connect, $fields);
            $this->loggedUserErrors = $loggedErrors;
            if (empty($this->loggedUserErrors)) {
                $result = $statistics->setStatistics($connect, $fields["username"], $database);
                $_SESSION['is_login_added'] = $result;
                header('Location: ' . HOST . BASE_URL);
                exit;
            }
        }
    }
    public function toHtml(): void 
    {
        include('view/base/v_header.php');
        include('view/base/v_content.php');
        include('view/authorize/v_login.php');
        include('view/base/v_footer.php');
    }
}
