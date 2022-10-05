<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $title ?></h1>
            <hr>

            <form class="d-inline" method="POST">
                <div class="row m-3 align-items-start">
                    <p class="forgot-password-headline"><?= __('Enter your new password above') ?></h2>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="newPass"><?= __('New Password') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="password" class="form-control" id="newPass" name="new_password" value="<?= $fields['new_password'] ?>">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="newPassRepeat"><?= __('Repeat new password') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="password" class="form-control" id="newPassRepeat" name="new_password_repeat" value="<?= $fields['new_password_repeat'] ?>">
                    </div>
                </div>
                <input class="btn btn-change" name="set_new_pass" value="<?= __('Set new password') ?>" type="submit">
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