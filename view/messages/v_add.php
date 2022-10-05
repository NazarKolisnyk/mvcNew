<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="post">
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="messageName"><?= __('Title') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="messageName" name="title" value="<?= $fields['title'] ?>">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="messageId"><?= __('Message') ?></label>
                    </div>
                    <div class="col-auto">
                        <textarea class="form-control" type="text" name="content" id="messageId"><?= $fields['content'] ?></textarea>
                    </div>
                </div>

                <input class="btn btn-change" name="submit" value="<?= __('Save') ?>" type="submit">
                <a class="btn btn-cancel" href="<?= BASE_URL ?>"><?= __('Cancel') ?></a>
            </form>
            <hr>
            <div>
                <? foreach ($this->validateErrors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <? endforeach; ?>
            </div>