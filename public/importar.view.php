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
        <?= $greetins ?>
    </h1>

</header>
<table>
    <?php foreach($resultats as $key => $resultat): ?>
        <tr>
        <?php foreach($resultat  as $item): ?>
            <td><?= $item ?></td>
        <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
