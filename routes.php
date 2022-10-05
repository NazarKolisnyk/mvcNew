<?php

declare(strict_types=1);

return (function(){
    $intGT0 = '[1-9]+\d*';
    $text = '[0-9aA-zZ_-]+';

    return [
        [
            'regex' => '/^$/',
            'controller' => 'Messages/Index'
        ],
        [
            'regex' => '/^messages\/?$/',
            'controller' => 'Messages/Index'
        ],
        [
            'regex' => '/^messages\/add\/?$/',
            'controller' => 'Messages/AddMessage'
        ],
        [
            'regex' => "/^messages\/delete\/?$/",
            'controller' => 'Messages/DeleteMessage'
        ],
        [
            'regex' => "/^messages\/edit\/?$/",
            'controller' => 'Messages/EditMessage'
        ],
        [
            'regex' => '/^register\/?$/',
            'controller' => 'Authorize/Register'
        ],
        [
            'regex' => '/^login\/?$/',
            'controller' => 'Authorize/Login'
        ],
        [
            'regex' => '/^logout\/?$/',
            'controller' => 'Authorize/Logout'
        ],
        [
            'regex' => '/^forgot_pass\/?$/',
            'controller' => 'Authorize/ForgotPass'
        ],
        [
            'regex' => '/^forgot_pass_confirm\/?$/',
            'controller' => 'Authorize/ForgotPassConfirm'
        ],
        [
            'regex' => '/^change_pass\/?$/',
            'controller' => 'Authorize/ChangePass'
        ],
        [
            'regex' => '/^restrict\/?$/',
            'controller' => 'Authorize/Restrict'
        ],
        [
            'regex' => '/^users\/?$/',
            'controller' => 'Admin/Users'
        ],
        [
            'regex' => '/^role\/?$/',
            'controller' => 'Admin/Role'
        ],
        [
            'regex' => '/^contacts\/?$/',
            'controller' => 'Contacts/Contacts'
        ],
        [
            'regex' => "/^profile\/?$/",
            'controller' => 'Profile/Profile'
        ],
        [
            'regex' => "/^statistics\/?$/",
            'controller' => 'Statistics/Scheme'
        ],
        
        [
            'regex' => "/^profile\/edit\/?$/",
            'controller' => 'Profile/EditProfile'
        ],
        [
            'regex' => "/^create_role\/?$/",
            'controller' => 'Admin/CreateRole'
        ],
        [
            'regex' => "/^edit_role\/?$/",
            'controller' => 'Admin/EditRole'
        ],
        [
            'regex' => "/^statements\/?$/",
            'controller' => 'Admin/Statements'
        ],
        [
            'regex' => "/^pages\/?$/",
            'controller' => 'Pages/Pages'
        ],
        [
            'regex' => "/^pages\/add_page\/?$/",
            'controller' => 'Pages/AddPage'
        ],

        [
            'regex' => "/^pages\/($intGT0)\/edit_page\/?$/",
            'controller' => 'Pages/EditPage',
            'params' => [
                'id' => 1
            ]
        ],

        [
            'regex' => "/^($text)\/?$/",
            'controller' => 'Pages/NewPage',
            'params' => [
                'url' => 1
            ]
        ],
    ];
})();