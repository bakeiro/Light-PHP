    </div>
</div>

<!-- Console -->
<?php

    use Library\Config;

    if (Config::get("debug_console")) {
        include VIEW . "template/common/Console.php";
    }
    ?>

<br><br>

<footer class="page-footer blue" style="padding-top: 10px;">

    <div class='container'>
        <h4>Footer</h4>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Footer:
            src/view/template/common/footer.php
        </div>
    </div>

</footer>

</body>
</html>
