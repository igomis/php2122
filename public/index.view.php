<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/examples/styles.css" />
</head>
<body>
<header>
    <h1>
        <?= $greetins ."visita nª".$visites ?>
    </h1>

</header>
<ul>
    <li><strong>Tìtol:</strong> <?= $tasks['title'] ?></li>
    <li><strong>Data d'entrega:</strong> <?= $tasks['due'] ?></li>
    <li><strong>Assignada a:</strong> <?= $tasks['assigned_to'] ?></li>
    <li><strong>Finalitzada:</strong>
        <?php if ($tasks['completed']): ?>
                <?=  '&#9989;' ?>
        <?php else: ?>
                <?=  '&#10062;' ?>
        <?php endif ?>
    </li>
</ul>
<a href="logout.php">Logout</a>
</body>
</html>