<?php 
    Content::getHeader('Успешно удалено');
?>

<div class="auth-block">
    <div class="card">
        <div class="card-content">
            <?php if($deletion): ?>
                <div class="page-title">
                    <h5>Запись была удалена успешно</h5>
                </div>
                <div class="card-action">
                    <a class="modal-action btn waves-effect" href="http://localhost/drawings">Перейти на главную</a>
                </div>
            <?php else: ?>
                <div class="page-title">
                    <h5>Произошла ошибка</h5>
                </div>
                <div class="card-action">
                    <a class="modal-action btn waves-effect" href="http://localhost/drawings/<?php echo $id ;?>">Вернуться назад</a>
                </div>
            <?php endif; ?>
        </div>    
                
    </div>
</div>

<?php
    Content::getScripts();
?>
</body>
</html>