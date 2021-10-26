<?php
    session_start();
    require('../helpers/myHelpers.php');

    $user = unserialize($_SESSION['user']);
    if (!$user) {
        header('Location: /login.php');
    }
    $greetins = "Hola ".htmlspecialchars($user->name);
    $tasks = [
        'title' => 'Acabar vistes programa',
        'due' => 'today',
        'assigned_to' => 'Ignasi',
        'completed' => false
    ];
    if (isset($_SESSION['visites']))
        $_SESSION['visites']++;
    else
        $_SESSION['visites'] = 1;

    $visites = $_SESSION['visites'];
    require('index.view.php');
