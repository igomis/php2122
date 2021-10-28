<?php
require_once ('../kernel.php');
use App\Ofegat;

$intendInvalids = 0;
$ofegat = new Ofegat('Imbecil');
$intendInvalids += $ofegat->addLetter('i');
var_dump($intendInvalids,$ofegat->render());
$intendInvalids += $ofegat->addLetter('b');
var_dump($intendInvalids,$ofegat->render());
$intendInvalids += $ofegat->addLetter('z');
var_dump($intendInvalids,$ofegat->render());
$intendInvalids += $ofegat->addLetter('e');
var_dump($intendInvalids,$ofegat->render());
$intendInvalids += $ofegat->addLetter('m');
var_dump($intendInvalids,$ofegat->render());
$intendInvalids += $ofegat->addLetter('c');
var_dump($intendInvalids,$ofegat->render());
$intendInvalids += $ofegat->addLetter('l');
var_dump($intendInvalids,$ofegat->render());


