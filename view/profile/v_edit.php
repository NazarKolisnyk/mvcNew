<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="POST">
                <input class="btn btn-change" name="edit_user" value="<?= __('Save') ?>" type="submit">
                <a class="btn btn-cancel" href="<?= BASE_URL ?>role"><?= __('Cancel') ?></a>
            </form><br>
            <?php if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>