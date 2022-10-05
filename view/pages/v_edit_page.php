<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="POST">
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="pageName"><?= __('Page') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="pageName" name="pageName">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="content"><?= __('Content') ?>:</label>
                    </div>
                    <div class="col-auto">
                        <textarea class="form-control" cols="30" rows="10" id="content" name="content"></textarea>
                    </div>
                </div>

                <input class="btn btn-change" value="<?= __('Save') ?>" type="submit">
                <a class="btn btn-cancel" href="<?= BASE_URL ?>"><?= __('Cancel') ?></a>
            </form>
            <hr>
            <?php if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>