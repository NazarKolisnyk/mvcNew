<nav class="site-nav btn-cancel">
    <div class="container header-nav">
        <ul class="nav">
            <?php if (restrict('users')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>users"><?= __('Users') ?></a>
                </li>
            <?php endif; ?>
            <?php if (restrict('role')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>role"><?= __('Role') ?></a>
                </li>
            <?php endif; ?>
            <?php if (restrict('pages')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>pages"><?= __('Pages') ?></a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>statistics"><?= __('Statistics') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>statements"><?= __('Statements') ?></a>
            </li>
        </ul>
    </div>
</nav>
<?php if (restrict('ban')) : ?>
    <h1 class="ban"><?= __('You BAN') ?></h1>
<?php else : ?>
    <div class="site-content">
        <div class="container">
            <main class="main">
                <h1><?= $this->title ?></h1>
                <hr>
                <form action="<?= BASE_URL ?>profile/edit" method="POST">
                    <ul class="list-group">
                        <?php foreach ($this->users as $user) :
                            if ($user['login'] == $this->userName) : ?>
                                <li class="list-group-item">
                                    <label><strong><?= __('User email') ?>:</strong></label><em> <?= $user['email'] ?></em><br>
                                    <label><strong><?= __('Title') ?>:</strong></label><em> <?= $user['login'] ?></em><br>
                                    <label><strong><?= __('Password') ?>:</strong></label><em> *********</em><br>
                                    <label><strong><?= __('Role') ?>:</strong></label>
                                    <?php foreach ($this->roles as $role) :
                                        if ($user['role'] == $role['id']) {
                                            print_r('<em>' . $role['role'] . '</em>');
                                        }
                                    endforeach; ?>
                                </li>
                        <?php endif;
                        endforeach; ?>
                    </ul>
                    <details <? if ($this->roleNumber == 1) : ?>class="default" <? endif; ?>>
                        <summary>Do you want a role?</summary>
                        <div class="row m-3 align-items-start">
                            <div class="col-auto">
                                <label class="col-form-label" for="argument"><?= __('Argue') ?></label>
                            </div>
                            <div class="col-auto">
                                <textarea class="form-control" type="text" name="argument" id="argument"><?= $fields['message'] ?></textarea>
                            </div>
                        </div>
                        <div class="row m-3 align-items-start">
                            <div class="col-auto">
                                <label class="col-form-label" for="argument"><?= __('Role') ?></label>
                            </div>
                            <div class="col-auto">
                                <select name="role" id="role">
                                    <option value="-1" disabled selected><?= __('Role') ?></option>
                                    <?php foreach ($this->roles as $role) :
                                        if ($role['id'] >= 2 and $role['id'] != $this->roleNumber) : ?>
                                            <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                                    <? endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-change" name="type" value="true" type="submit"><?= __('Edit role') ?></button>
                    </details>
                </form>
            <?php endif; ?>