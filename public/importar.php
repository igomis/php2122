<?php
    require('../helpers/myHelpers.php');
    $greetins = "Importar";
    $fitxer = "../sources/EjemploResultados.csv";

    if (!$fp = fopen($fitxer, "r")){
        echo "No s'ha pogut obrir el fitxer $fitxer";
    }
    $contents = fread($fp,filesize($fitxer));
    $linees = explode(PHP_EOL,$contents);
    foreach ($linees as $linea){
       $resultats[] = explode(';',$linea);
    }
    require('importar.view.php');