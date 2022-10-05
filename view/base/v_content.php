<nav class="site-nav">
    <div class="container header-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>"><?= __('Home') ?></a>
            </li>
            <?php if (is_numeric($this->roleNumber) and restrict('add-message')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>messages/add"><?= __('Add') ?></a>
                </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>contacts"><?= __('Contacts') ?></a>
            </li>
        </ul>
        <ul class="nav">
            <?php if (!is_numeric($this->roleNumber)) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>login"><?= __('Login') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>register"><?= __('Register') ?></a>
                </li>
            <?php endif ?>
            <?php if (is_numeric($this->roleNumber) and !restrict('ban')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>profile"><?= __('Profile') ?></a>
                </li>
            <?php endif ?>
            <?php if (is_numeric($this->roleNumber)) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>logout"><?= __('Log Out') ?></a>
                </li>
            <?php endif ?>
            <li class="nav-item">
                <form method="GET">
                    <input type="hidden" value="en" name="ln">
                    <button class="btn nav-link"><img class="flack" src="../../assets/images/usd.png" alt=""></button>
                </form>
            </li>
            <li class="nav-item">
                <form method="GET">
                    <input type="hidden" value="ua" name="ln">
                    <button class="btn nav-link"><img class="flack" src="../../assets/images/uk.png" alt=""></button>
                </form>
            </li>
            <li class="nav-item">
                <form method="GET">
                    <input type="hidden" value="pl" name="ln">
                    <button class="btn nav-link"><img class="flack" src="../../assets/images/pl.png" alt=""></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
