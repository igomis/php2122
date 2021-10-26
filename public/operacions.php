<?php
    $x = htmlspecialchars($_GET['x']);
    $y = htmlspecialchars($_GET['y']);

    print_r($_SERVER);
    echo "<br/>Suma: ".$x+$y."</br>";
    echo "Resta: ".$x-$y."</br>";
    echo "Multipliació: ".$x*$y."</br>";
    echo "Divisió: ".$x/$y."</br>";
