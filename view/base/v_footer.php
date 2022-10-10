        </main>
    </div>
</div>
<footer class="site-footer text-white">
    <div class="container">
        &copy; MVC site
    </div>
</footer>
<?php if (is_numeric($this->roleNumber) == 1) : ?>
<section class="wrapper-terminal">
    <div class="terminal">
        <h1>Admin terminal</h1>
        <textarea name="terminal" id="terminal" rows="10" wrap="soft"></textarea>
    </div>
</section>
<script src="../../assets/js/terminal.js"></script>
<?php endif ?>
</body>

</html>