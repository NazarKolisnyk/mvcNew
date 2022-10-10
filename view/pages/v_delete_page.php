<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <?php if ($_POST["page"]) : ?>
                <form class="d-inline" method="POST">
                    <div class="delete-message-block">
                        <label><strong><?= __('Are you sure?') ?></strong></label>
                    </div>
                    <button class="btn btn-change" type="submit" name="delete_page" value="<?= $_POST['page'] ?>"><?= __('Perform') ?></button>
                </form>
            <?php endif; ?>
            <a class="btn btn-cancel <?php if (!$_POST["page"]) : ?>w-100<?php endif; ?>" href="<?= BASE_URL ?>pages"><?= __('Cancel') ?></a><br><br>
            <?php if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>