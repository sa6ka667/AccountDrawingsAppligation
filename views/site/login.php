<?php 
include ROOT.'/components/Content.php';
    Content::getHeader('Вход');

?>

<body>

    <nav>
        <div class="nav-wrapper grey darken-1">
            <a href="#" class="brand-logo">Unihimtek</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="http://localhost">Вход</a></li>
                <li><a href="http://localhost/registration">Регистрация</a></li>
            </ul>
        </div>
    </nav>
    <div class="auth-block">
        <div class="card">
            <form method="POST" action="#">
                <div class="card-content">
                    <span class="card-title">Войти в систему</span>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <?php foreach($errors as $error): ?>
                            <blockquote><?php echo $error ?></blockquote> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="input-field">
                        <input id="email" type="text" required value = '<?php echo $login ?>' name="login">
                        <label for="email">Логин:</label>
                    </div>
                    <div class="input-field">
                        <input id="password" type="password" required name="password">
                        <label for="password">Пароль:</label>
                    </div>
                </div>
                <div class="card-action">
                    <button class="modal-action btn waves-effect" type="submit" name="submit">Войти</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    Content::getScripts();
    ?>
</body>

</html>