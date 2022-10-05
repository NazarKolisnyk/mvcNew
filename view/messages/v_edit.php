<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="POST">
                <?php if ($_POST["message"]) : ?>
                    <div class="row m-3 align-items-start">
                        <div class="col-auto bg-color">
                            <?php foreach ($this->messages as $message) :
                                if ($message['id'] == $_POST['message']) : ?>
                                    <label><strong><?= __('Title') ?>:</strong></label><em> <?= $message['title'] ?></em><br>
                                    <label><strong><?= __('Message') ?>:</strong></label><em> <?= $message['message'] ?></em><br>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
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
                    <button class="btn btn-change" name="edit_message" value="<?= $_POST["message"] ?>" type="submit"><?= __('Save') ?></button>
                <?php endif; ?>
                <a class="btn btn-cancel <?php if (!$_POST["message"]) : ?>w-100<?php endif; ?>" href="<?= BASE_URL ?>"><?= __('Cancel') ?></a>
            </form>
            <hr>
            <? if ($_POST['edit_message']) :
                foreach ($this->validateErrors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <? endforeach;
            endif;
            if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>