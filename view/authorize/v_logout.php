<?php
$userInfo = (array) json_decode($_COOKIE['user_info']);
?>

<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $title ?></h1>
            <hr>

            <form class="d-inline" method="POST">
                <div class="delete-message-block">
                    <p class="log-out-text">You want to sign out of <b><?= $userInfo['username'] ?></b>?</p>
                </div>
                <input class="btn btn-change" name="logout" value="<?= __('Log Out') ?>" type="submit">
            </form>
            <a class="btn btn-cancel" href="<?= BASE_URL ?>"><?= __('Cancel') ?></a>