<nav class="site-nav btn-cancel">
    <div class="container header-nav">
        <ul class="nav">
            <?php if (restrict('edit-message')) : ?>
                <li class="nav-item d-flex">
                    <label class="nav-link"><?= __('Regime') ?></label>
                    <select name="editor" id="editor">
                        <option value="viewer"><?= __('Viewer') ?></option>
                        <option value="editor"><?= __('Editor') ?></option>
                    </select>
                </li>
            <?php endif; ?>

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
                <div class="row" id="look">
                    <div class="profile col-3">
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
                    <section class="default col-9" id="editor-look">

                        <?php if (restrict('message')) : ?>
                            <form method="POST">
                                <ul class="list-group message">
                                    <?php foreach ($this->messages as $key => $message) :
                                        $json[] = [$message]; ?>
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
                    </section>
                    <section id="viewer-look" class='liveExample col-9'>
                        <div data-bind='simpleGrid: gridViewModel'></div>
                    </section>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <script src="../../assets/js/library/knockout-3.5.1.debug.js"></script>
    <script src="../../assets/js/library/simpleGrid.js"></script>
    <script>
            let initialData = <?php echo json_encode($json); ?>;
            let PagedGridModel = function(items) {
                this.items = ko.observableArray(items);

                this.gridViewModel = new ko.simpleGrid.viewModel({
                    data: this.items,
                    columns: [{
                            headerText: "Name:",
                            rowText: "name"
                        },
                        {
                            headerText: "Title:",
                            rowText: "title"
                        },
                        {
                            headerText: "Message:",
                            rowText: "message"
                        }
                    ],
                    pageSize: 4
                });
            };
            ko.applyBindings(new PagedGridModel(initialData.flat()));
            document.querySelector('#editor').addEventListener('change', function(e) {
                console.log(e.target.value);
                if (e.target.value == "viewer") {
                    document.querySelector('#viewer-look').classList.remove('default');
                    document.querySelector('#editor-look').classList.add('default');
                } else if (e.target.value == "editor") {
                    document.querySelector('#editor-look').classList.remove('default');
                    document.querySelector('#viewer-look').classList.add('default');
                }
            })
        </script>