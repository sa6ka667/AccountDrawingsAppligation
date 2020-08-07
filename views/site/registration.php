<?php 
include ROOT.'/components/Content.php';
    Content::getHeader('Регистрация');

?>

<nav>
    <div class="nav-wrapper  grey darken-1">
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
                <?php if($result): ?>
                    <div class="page-title">
                        <h5>Поздравляем, регистрация прошла успешно!</h5>
                    </div>
                    <div class="card-action">
                        <a class="modal-action btn waves-effect" href="http://localhost/login">Войти</a>
                    </div>
                <?php else: ?>
                <span class="card-title">Создать аккаунт</span>
                <?php if (isset($errors) && is_array($errors)): ?>
                        <?php foreach($errors as $error): ?>
                            <blockquote><?php echo $error ?></blockquote> 
                        <?php endforeach; ?>
                <?php endif; ?>
                <div class="input-field">
                    <input id="firstName" type="text" required value = '<?php echo $firstName ?>' name = "firstName">
                    <label for="firstName">Имя:</label>
                </div>
                <div class="input-field">
                    <input id="lastName" type="text" required value = '<?php echo $secondName ?>' name = "secondName">
                    <label for="lastName">Фамилия:</label>
                </div>
                <div class="input-field">
                    <input id="email" type="text" required value = '<?php echo $login ?>' name = "login">
                    <label for="email">Логин:</label>
                </div>
                <div class="input-field">
                    <input id="password" type="password" required name = "password1">
                    <label for="password">Пароль:</label>
                </div>
                <div class="input-field">
                    <input id="password" type="password" required name = "password2">
                    <label for="password">Повторите пароль:</label>
                </div>
            </div>
            <div class="card-action">
                <button class="modal-action btn waves-effect" type="submit" name="submit">Создать</button>
            </div>
                        <?php endif; ?>
        </form>
    </div>
</div>

<?php
    Content::getScripts();
?>
</body>
</html>