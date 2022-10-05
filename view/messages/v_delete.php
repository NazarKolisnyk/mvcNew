<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <?php if ($_POST["message"]) : ?>
                <form class="d-inline" method="POST">
                    <div class="delete-message-block">
                        <label><strong><?= __('Are you sure?') ?></strong></label>
                    </div>
                    <button class="btn btn-change" type="submit" name="delete_message" value="<?= $_POST['message'] ?>"><?= __('Perform') ?></button>
                </form>
            <?php endif; ?>
            <a class="btn btn-cancel <?php if (!$_POST["message"]) : ?>w-100<?php endif; ?>" href="<?= BASE_URL ?>"><?= __('Cancel') ?></a><br><br>
            <?php if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>