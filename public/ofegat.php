<?php
require_once ('../kernel.php');
use App\Ofegat;

$intendInvalids = 0;
$ofegat = new Ofegat('Imbecil');
$intendInvalids += $ofegat->addLetter('i');
$ofegat->render();
$intendInvalids += $ofegat->addLetter('b');
$ofegat->render();
$intendInvalids += $ofegat->addLetter('z');
$ofegat->render();
dd($intendInvalids);

