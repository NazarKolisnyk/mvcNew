<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="post">
                <?php if ($_POST['edit']) : ?>
                <div class="row m-3 align-items-start">
                    <div class="col-auto bg-color">
                        <?php foreach ($this->roles as $role) :
                            if ($role['id'] == $_POST['edit']) : ?>
                                <label class="col-form-label" for="roleName"><?= __('Role') ?>:</label><em class="col-form-label"> <?= $role['role'] ?></em><br>
                                <label class="col-form-label" for="roleName"><?= __('Permissions') ?>:</label><em class="col-form-label"> <?= $role['permission'] ?></em>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="roleName"><?= __('Edit role') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="roleName" name="roleName">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="messageId"><?= __('Edit permissions') ?>:</label>
                    </div>
                    <div class="col-auto">
                        <?php foreach ($this->roles as $role) {
                            if ($role['id'] == $this->roleNumber) {
                                $arr = explode(", ", $role['permission']);
                                foreach ($arr as $permission) {
                                    print_r('<label class="col-form-label" for="id_' . $permission . '">' . $permission . '</label>
                            <input type="checkbox" name="id[]" value="' . $permission . '"><br>');
                                }
                            }
                        } ?>

                    </div>
                </div>
                <button class="btn btn-change" name="type" value="<?= $_POST['edit'] ?>" type="submit"><?= __('Save') ?></button>
                <?php endif; ?>
                <a class="btn btn-cancel" href="<?= BASE_URL ?>role"><?= __('Cancel') ?></a>
            </form>
            <hr>
            <?php if ($this->error) : ?>
            <div class="alert alert-danger" role="alert"><?= $this->error ?></div>
            <?php endif; ?>