<?php 
    Content::getHeader($drawingItem['name']);
    Content::getSideBar();
?>

<!--CONTENT-->
<main class="content">
                <div class="page-title">
                    <h4>
                        <?php echo $drawingItem['name']; ?>
                    </h4>
                </div>

                <div class="row">
                    <div class="col s12">
                        <div class="collection center">

                            <a>
                            <a href="<?php echo $drawingItem['imAssembly']; ?>"><img src="http://localhost<?php echo $drawingItem['imAssembly'];?>"
                                alt="Сборочный чертёж" width="522px" height="675px"></a>
                            <a href="<?php echo $drawingItem['imSpecification']; ?>"><img
                                src="http://localhost<?php echo $drawingItem['imSpecification'];?>" alt="Спецификация" width="522px"
                                height="675px"></a>
                            <table class="striped" style="width: 75%; margin: auto;">
                                <thead>
                                    <tr>
                                        <td><a class="waves-effect waves-light btn grey darken-1 z-depth-3" href="..<?php echo $drawingItem['zipPDF']; ?>"><i
                                                class="material-icons left">cloud_download</i>Скачать PDF</a></td>
                                        <td><a class="waves-effect waves-light btn grey darken-1 z-depth-3" href="..<?php echo $drawingItem['zipGRB']; ?>"><i
                                                class="material-icons left">cloud_download</i>Скачать GRB</a></td>
                                    </tr>
                                    <tr>
                                        <th>Характеристика</th>
                                        <th>Значение</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Диаметр вала (мм)</td>
                                        <td>
                                            <?php echo $drawingItem['shaftDiametr']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Диаметр сальниковой камеры (мм)</td>
                                        <td>
                                            <?php echo $drawingItem['stuffingBoxDiametr']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Монтажное расстояние (мм)</td>
                                        <td>
                                            <?php echo $drawingItem['mountingDistance']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Направление вращения вала</td>
                                        <td>
                                            <?php echo $drawingItem['shaftRotationDirection']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Рабочая среда</td>
                                        <td>
                                            <?php echo $drawingItem['workEnvironment']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Насос</td>
                                        <td>
                                            <?php echo $drawingItem['plump']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Заказчик</td>
                                        <td>
                                            <?php echo $drawingItem['customer']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Разработал</td>
                                        <td>
                                            <b><?php echo $drawingItem['developer']; ?></b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </a>
                        </div>
                    </div>
                </div>

            </main>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red" href = "http://localhost/drawings/edit/<?php echo $drawingItem['id']; ?>">
                    <i class="large material-icons">edit</i>
                </a>
                <ul>
                    <li><a class="btn-floating green modal-trigger" href = "#modal1"><i class="material-icons">delete</i></a></li>
                </ul>
            </div>
            <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Вы действительно хотите удалть запись?</h4>
                <p>Это действие отменить невозможно</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect green darken-2 btn-flat" style="color: rgb(240, 240, 238);">Нет, оставить</a>
                <a href="http://localhost/drawings/delete/<?php echo $drawingItem['id']; ?>" class="modal-close waves-effect waves-green btn-flat red darken-2" style="color: rgb(240, 240, 238);">Да, удалить</a>
            </div>
            </div>

<?php
    Content::getScripts();
?>

</body>
</html>




