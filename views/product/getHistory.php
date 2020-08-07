<?php 
    Content::getHeader('История');
    Content::getSideBar();
?>

<!--CONTENT-->
<main class="content">
    <div class="page-title">
        <h4>История</h4>
    </div>

    <table class="highlight mb2">

        <thead>
        <tr>
            <th>Дата</th>
            <th>Время</th>
            <th>Изделие</th>
            <th>Действие</th>
            <th>Ответственный</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
            <?php foreach ($drawingHistory as $rowHistory):?>
        <tr>
            <td><?php echo $rowHistory['date']; ?></td>
            <td><?php echo $rowHistory['time']; ?></td>
            <td><?php echo $rowHistory['subject']; ?></td>
            <td><?php echo $rowHistory['action']; ?></td>
            <td><?php echo $rowHistory['actioner']; ?></td>
            <td>
                <a class="btn btn-small modal-trigger grey darken-1" href = "/drawings/<?php echo $rowHistory['position']; ?>">
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