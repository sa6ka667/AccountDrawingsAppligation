<?php 
    Content::getHeader('Добавить новую запись');
    Content::getSideBar();
?>
            <!--CONTENT-->
            <main class="content">
            <?php if($history && $adding):
                header("Location: http://localhost/drawings/$id");
            else: ?>
                <div class="page-title">
                    <h4>Добавить новую запись</h4>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="card-content">
                        <div class="input-field">
                            <input id="name" type="text" required name="name" value = "<?php echo $name;?>">
                            <label for="name">Наименование изделия:</label>
                        </div>
                        <div class="input-field">
                            <input id="shaftDiametr" type="text" required name="shaftDiametr" value = "<?php echo $shaftDiametr ;?>">
                            <label for="shaftDiametr">Диаметр вала (мм):</label>
                        </div>
                        <div class="input-field">
                            <input id="stuffingBoxDiametr" type="text" required name="stuffingBoxDiametr" value = "<?php echo $stuffingBoxDiametr;?>">
                            <label for="stuffingBoxDiametr">Диаметр сальниковой камеры (мм):</label>
                        </div>
                        <div class="input-field">
                            <input id="mountingDistance" type="text" required name="mountingDistance" value = "<?php echo $mountingDistance;?>">
                            <label for="mountingDistance">Монтажное расстояние (мм):</label>
                        </div>
                        <div class="input-field">
                            <input id="shaftRotationDirection" type="text" required name="shaftRotationDirection" value = "<?php echo $shaftRotationDirection;?>">
                            <label for="shaftRotationDirection">Направление вращения вала:</label>
                        </div>
                        <div class="input-field">
                            <input id="workEnvironment" type="text" name="workEnvironment" value = "<?php echo $workEnvironment;?>">
                            <label for="workEnvironment">Рабочая среда:</label>
                        </div>
                        <div class="input-field">
                            <input id="plump" type="text" name="plump" value = "<?php echo $plump;?>">
                            <label for="plump">Насос:</label>
                        </div>
                        <div class="input-field">
                            <input id="customer" type="text" name="customer" value = "<?php echo $customer;?>">
                            <label for="customer">Заказчик:</label>
                        </div>
                        <label for="imAssembly">Сборочный чертёж:</label>
                        <div class="input-field">
                            <input id="imAssembly" type="file" required name="imAssembly">
                        </div>
                        <label for="imSpecification">Спецификация:</label>
                        <div class="input-field">
                            <input id="imSpecification" type="file" required name="imSpecification">
                        </div>
                        <label for="zipPDF">Чертежи(PDF):</label>
                        <div class="input-field">
                            <input id="zipPDF" type="file" name="zipPDF">
                        </div>
                        <label for="zipGRB">Чертежи(GRB):</label>
                        <div class="input-field">
                            <input id="zipGRB" type="file" name="zipGRB">
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="modal-action btn waves-effect" type="submit" name="submit">Добавить</button>
                    </div>
                </form><br>
            <?php endif; ?>
            </main>


            <?php
            Content::getFloatingButtons();
            Content::getScripts();
            ?>
    </body>

    </html>