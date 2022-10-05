<?php if (restrict('ban')) : ?>
    <h1 class="ban"><?= __('You BAN') ?></h1>
<?php else : ?>
    <div class="site-content">
        <div class="container">
            <main class="main">
                <h1><?= $this->title ?></h1>
                <hr>
                <div class="vrapper">
                    <div class="profile">
                        <a class="nav-link" href="<?= BASE_URL ?>profile">
                            <img src="../../assets/images/user.jpg" class="user" alt="">
                        </a>
                        <details class="nav-link" open>
                            <?php foreach ($this->users as $user) :
                                if ($user['login'] == $this->userName) : ?>
                                    <summary><?= $user['login'] ?></summary>
                                    <label><strong><?= __('User email') ?>:</strong></label><em> <?= $user['email'] ?></em><br>
                                    <label><strong><?= __('Role') ?>:</strong></label>
                            <?php foreach ($this->roles as $role) :
                                        if ($user['role'] == $role['id']) {
                                            print_r('<em>' . $role['role'] . '</em>');
                                        }
                                    endforeach;
                                endif;
                            endforeach; ?>
                        </details>
                    </div>
                    <?php if (restrict('message')) : ?>
                        <form method="POST">
                            <ul class="list-group message">
                                <?php foreach ($this->messages as $message) : ?>
                                    <?php if ($this->userName == $message['name']) : ?>
                                        <li class="list-group-item bg-color">
                                        <?php else : ?>
                                        <li class="list-group-item">
                                        <?php endif; ?>
                                        <label><strong><?= __('User Name') ?>:</strong></label><em> <?= $message['name'] ?></em><br>
                                        <label><strong><?= __('Title') ?>:</strong></label><em> <?= $message['title'] ?></em><br>
                                        <label><strong><?= __('Message') ?>:</strong></label><em> <?= $message['message'] ?></em><br>
                                        <label><strong><?= __('Created At') ?>:</strong></label><em> <?= $message['created_at'] ?></em><br>
                                        <?php if ($message['status']) : ?>
                                            <label><strong><em><?= __('Edited') ?></em></strong></label><br>
                                        <?php endif; ?>
                                        <?php if (restrict('delete-message')) : ?>
                                            <button class="btn btn-cancel" type="submit" name="message" value="<?= $message['id'] ?>" formaction="<?= BASE_URL ?>messages/delete"><?= __('Delete') ?></button>
                                        <?php endif; ?>
                                        <?php if (restrict('edit-message')) : ?>
                                            <button class="btn btn-change" type="submit" name="message" value="<?= $message['id'] ?>" formaction="<?= BASE_URL ?>messages/edit"><?= __('Edit') ?></button>
                                        <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                            </ul>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endif; ?>