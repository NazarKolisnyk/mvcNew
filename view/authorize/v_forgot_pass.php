<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $title ?></h1>
            <hr>

            <form class="d-inline" method="POST">
                <div class="row m-3 align-items-start">
                    <p class="forgot-password-headline"><?= __('Enter the login and email of the lost account. We will send you a password reset code to the specified email.') ?></h2>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="username"><?= __('Username') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="username" name="username" value="<?= $fields['username'] ?>">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="email"><?= __('Email') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="email" name="email" id="email" value="<?= $fields['email'] ?>">
                    </div>
                </div>
                <input class="btn btn-change" name="get_code" value="<?= __('Get code') ?>" type="submit">
                <a class="btn btn-cancel" href="<?= BASE_URL ?>"><?= __('Go to main page') ?></a>
            </form>
            <hr>
            <div>
                <? foreach ($this->validateErrors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <? endforeach; ?>
            </div>