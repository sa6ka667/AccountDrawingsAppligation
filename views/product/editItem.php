<?php 
    Content::getHeader($drawingItem['name'].":Редактирование");
    Content::getSideBar();
?>

<main class="content">
        <?php if($history && $edition):
            header("Location: http://localhost/drawings/$drawingItem[id]");
        else: ?>
        <div class="page-title">
            <h4><?php echo $drawingItem['name'].":";?>Редактирование</h4>
        </div>
        <form method="POST" action="#">
            <div class="card-content">
                <div class="input-field">
                    <input id="name" type="text" required name="name" value="<?php echo $drawingItem['name'];?>">
                    <label for="name">Наименование изделия:</label>
                </div>
                <div class="input-field">
                    <input id="shaftDiametr" type="text" required name="shaftDiametr" value="<?php echo $drawingItem['shaftDiametr'];  ?>">
                    <label for="shaftDiametr">Диаметр вала (мм):</label>
                </div>
                <div class="input-field">
                    <input id="stuffingBoxDiametr" type="text" required name="stuffingBoxDiametr" value="<?php echo $drawingItem['stuffingBoxDiametr'];?>">
                    <label for="stuffingBoxDiametr">Диаметр сальниковой камеры (мм):</label>
                </div>
                <div class="input-field">
                    <input id="mountingDistance" type="text" required name="mountingDistance" value="<?php  echo $drawingItem['mountingDistance'];  ?>">
                    <label for="mountingDistance">Монтажное расстояние (мм):</label>
                </div>
                <div class="input-field">
                    <input id="shaftRotationDirection" type="text" required name="shaftRotationDirection" value="<?php  echo $drawingItem['shaftRotationDirection'];  ?>">
                    <label for="shaftRotationDirection">Направление вращения вала:</label>
                </div>
                <div class="input-field">
                    <input id="workEnvironment" type="text" name="workEnvironment" value="<?php  echo $drawingItem['workEnvironment'];  ?>">
                    <label for="workEnvironment">Рабочая среда:</label>
                </div>
                <div class="input-field">
                    <input id="plump" type="text" name="plump" value="<?php  echo $drawingItem['plump'];  ?>">
                    <label for="plump">Насос:</label>
                </div>
                <div class="input-field">
                    <input id="customer" type="text" name="customer" value="<?php  echo $drawingItem['customer'];  ?>">
                    <label for="customer">Заказчик:</label>
                </div>   
            </div>
            <div class="card-action">
                <button class="modal-action btn waves-effect" type="submit" name="edit">Редактировать</button>
            </div>
        <?php endif; ?>
        </form>
    </main>

<?php
    Content::getScripts();
?>
</body>
</html>