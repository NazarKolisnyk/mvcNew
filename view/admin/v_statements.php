<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form action="<?= BASE_URL ?>statements" method="POST">
                <ul class="list-group">
                    <? foreach ($this->statements as $statement) : ?>
                        <li class="list-group-item">
                            <label><strong><?= __('Role name') ?>:</strong></label><em> <?= $statement['user_name'] ?></em><br>
                            <label><strong><?= __('Argument') ?>:</strong></label><em> <?= $statement['argument'] ?></em><br>
                            <?php if (restrict('edit-role')) : ?>
                            <button class="btn btn-change" name="edit" value="<?= $statement['user_id'] ?>"  type="submit"><?= __('Edit') ?></button>
                            <button class="btn btn-cancel" name="сancel" value="<?= $statement['id'] ?>"  type="submit"><?= __('Cancel') ?></button>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </form>