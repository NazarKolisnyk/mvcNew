<div class="site-content">
    <div class="container">
        <main class="main">
            <h1><?= $this->title ?></h1>
            <hr>
            <?php
            foreach ($this->logins as $login) {
                if ($login['login'] == $this->userName) {
                    $stringLogin .= $login['date'] . ';';
                }
            }
            foreach ($this->passwords as $password) {
                if ($password['login'] == $this->userName) {
                    $stringPassword .= $password['date'] . ';';
                }
            }
            foreach ($this->messages as $message) {
                if ($message['name'] == $this->userName) {
                    $stringMessage .= $message['created_at'] . ';';
                }
            } ?>
            <section id="statist-wrapper">
                <h1 id="statistic" data-login="<?= $stringLogin ?>" data-password="<?= $stringPassword ?>" data-message="<?= $stringMessage ?>"><?= $this->userName ?></h1>
                <select name="visual" id="visual">
                    <option value="bar">bar</option>
                    <option value="line">line</option>
                    <option value="doughnut">doughnut</option>
                    <option value="polarArea">polarArea</option>
                    <option value="radar">radar</option>
                </select>
                <select name="params" id="params">
                    <option value="login">login</option>
                    <option value="password">password</option>
                    <option value="message">message</option>
                </select>
                <select name="time" id="time">
                    <option value="years">years</option>
                    <option value="months">months</option>
                    <option value="days">days</option>
                </select>
                <select name="timeLine" class="default" id="time-line">
                </select>
                <button id="start">Start</button>
            </section>
            <div id="wrapper" class="wrapper_scheme">
                <canvas id="Scheme"></canvas>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="../../assets/js/statistics.js"></script>