<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>

            <ul class="list-group">
                <?php foreach ($this->statements as $statement) : ?>
                    <li class="list-group-item">
                        <form method="POST">
                            <label><strong><?= __('Role name') ?>:</strong></label><em> <?= $statement['user_name'] ?></em><br>
                            <?php foreach ($this->roles as $role) :
                                if ($role['id'] == $statement['new_role_id']) : ?>
                                    <label><strong><?= __('Role name') ?>: </strong></label><select name="role">
                                        <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                                    </select><br>
                            <?php endif;
                            endforeach; ?>
                            <label><strong><?= __('Argument') ?>:</strong></label><em> <?= $statement['argument'] ?></em><br>
                            <?php if ($statement['status'] == 2) : ?>
                                <label><strong><?= __('Status') ?>:</strong></label><em> <?= __('Refused') ?></em><br>
                            <?php elseif ($statement['status'] == 1) : ?>
                                <label><strong><?= __('Status') ?>:</strong></label><em> <?= __('Accepted') ?></em><br>
                            <?php elseif (restrict('edit-role')) : ?>
                                <button class="btn btn-change" name="edit" value="<?= $statement['user_id'] ?>" type="submit"><?= __('Edit') ?></button>
                                <button class="btn btn-cancel" name="сancel" value="<?= $statement['id'] ?>" type="submit"><?= __('Cancel') ?></button>
                            <?php else : ?>
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            <?php endif; ?>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <hr>
            <?php if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>