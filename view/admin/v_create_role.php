<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form method="post">
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="roleName"><?= __('Role') ?></label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="roleName" name="roleName">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="messageId"><?= __('Permissions') ?>:</label>
                    </div>
                    <div class="col-auto">
                    <?php foreach ($this->roles as $role) { 
                        if ($role['role'] == 'sys_admin') {
                            $arr = explode(", ", $role['permission']);
                            foreach ($arr as $permission) {
                                print_r('<label class="col-form-label" for="id_' . $permission . '">' . $permission . '</label>
                            <input type="checkbox" name="id_' . $permission . '" value="' . $permission . '"><br>');   
                            }
                        }
                    } ?>
                        
                    </div>
                </div>

                <input class="btn btn-change" value="<?= __('Save') ?>" type="submit">
                <a class="btn btn-cancel" href="<?= BASE_URL ?>"><?= __('Cancel') ?></a>
                
            </form>
            <hr>
            <div>
                <?foreach ($this->validateErrors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <? endforeach; ?>
            </div>