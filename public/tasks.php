<?php
require('../kernel.php');

$tasks = $query->selectAll('tasks');

?>

<ul>
    <?php foreach ($tasks as $task): ?>
        <li><?= $task->title ?>:<?= $task->assigned_to ?></li>
    <?php endforeach; ?>
</ul>