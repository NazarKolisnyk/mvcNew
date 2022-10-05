<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <form action="<?= BASE_URL ?>pages/add_page" method="POST">
                <ul class="list-group">
                    <?php foreach ($this->pages as $page) : ?>
                        <li class="list-group-item">
                            <em><a href="<?= BASE_URL . $page['url'] ?>"><?= $page['name'] ?></a></em>
                            <?php if (restrict('edit-page')) : ?>
                                <a class="btn btn-change" href="<?= BASE_URL ?>pages/<?= $page['id'] ?>/edit_page"><?= __('Edit') ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul><br>
                <?php if (restrict('add-page')) : ?>
                    <button class="btn btn-cancel" type="submit"><?= __('Add') ?></button>
                <?php endif; ?>
            </form>