<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form action="<?= BASE_URL ?>edit_role" method="POST">
                <ul class="list-group">
                    <? foreach ($this->roles as $role) : ?>
                        <li class="list-group-item">
                            <label><strong><?= __('Role name') ?>:</strong></label><em> <?= $role['role'] ?></em>
                            <details class="bg-color nav-link"><summary><?= __('permissions') ?></summary><em><?= $role['permission'] ?></em></details><br>
                            <?php if ($role['id'] > 4 and restrict('edit-role')) : ?>
                            <button class="btn btn-cancel" name="edit" value="<?= $role['id'] ?>"  type="submit"><?= __('Edit') ?></button>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul><br>
                <?php if (restrict('add-role')) : ?>
                <button class="btn btn-change w-100" formaction="<?= BASE_URL ?>create_role" type="submit"><?= __('Create') ?></button>
                <?php endif; ?>
            </form>