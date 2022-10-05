<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="POST">
                <ul class="list-group">
                    <?php foreach ($this->users as $user) : ?>
                            <li class="list-group-item">
                                <label><strong><?= __('User email') ?>:</strong></label><em> <?= $user['email'] ?></em><br>
                                <label><strong><?= __('Title') ?>:</strong></label><em> <?= $user['login'] ?></em><br>
                                <?php foreach ($this->roles as $role) :
                                    if ($user['role'] == $role['id']) {
                                        if ($user['role'] == 0) {
                                            print_r('<font color="red" size="5">' . $role['role'] . '</font>');
                                        } else {
                                            print_r("<label><strong>" . __('Role') . ":</strong></label><em> " . $role['role'] . "</em>");
                                        }
                                    }
                                endforeach; ?>
                        <?php if (restrict('edit-user') and $user['role'] != $this->roleNumber and $user['role'] != 1) : ?>
                                <input type="checkbox" name="id[]" value="<?= $user['id'] ?>">
                            </li>
                        <?php endif;
                    endforeach; ?>
                </ul>
                <?php if (restrict('edit-user')) : ?>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <select name="role" id="role">
                            <option value="-1" disabled selected><?= __('Role') ?></option>
                            <?php  foreach ($this->roles as $role) : 
                                if ($role['id'] != 1 and $role['id'] != $this->roleNumber) :?>
                                <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                                <? endif;
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select name="ban" class="default"  id="ban">
                            <option value="0">permanent</option>
                            <option value="0">for a day</option>
                            <option value="0">for a week</option>
                            <option value="0">for a month</option>
                        </select>
                    </div>
                </div>
                <input value="<?= __('Edit') ?>" class="btn w-100 btn-cancel" name="type" type="submit">
                <?php endif; ?>
            </form>
            <hr>
            <?php if ($this->error) : ?>
                <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>

            <script src="../../assets/js/ban.js"></script>