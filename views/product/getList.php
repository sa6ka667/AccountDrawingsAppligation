<?php 
    Content::getHeader('Чертежи');
    Content::getSideBar();
?>

<!--CONTENT-->
<main class="content">
    <div class="page-title">
        <h4>Чертежи</h4>
    </div>

    <table class="highlight mb2">

        <thead>
        <tr>
            <th>Наименование</th>
            <th>Рабочая среда</th>
            <th>Насос</th>
            <th>Заказчик</th>
            <th>Разаработал</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
            <?php foreach ($drawingList as $drawing):?>
        <tr>
            <td><?php echo $drawing['name']; ?></td>
            <td><?php echo $drawing['workEnvironment']; ?></td>
            <td><?php echo $drawing['plump']; ?></td>
            <td><?php echo $drawing['customer']; ?></td>
            <td><?php echo $drawing['developer']; ?></td>
            <td>
                <a class="btn btn-small modal-trigger grey darken-1" href = "/drawings/<?php echo $drawing['id']; ?>">
                    <i class="material-icons">open_in_new</i>
                </a>
            </td>
        </tr>
            <?php endforeach; ?>  

        </tbody>

    </table>
</main>

<?php
    Content::getFloatingButtons();
    Content::getScripts();
?>

</body>
</html>