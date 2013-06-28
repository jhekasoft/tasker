<?php

function chto($foo, $bar, $baz, $bat)
{
//    echo $foo.'---'.$bar;
    echo 'Alisa,Tolik';
    echo $baz;
}

$a = 25;
$b = 20;
$c = 30;
$d = 'hello';
$e = 'world';

$a = $b;
$b = $c;
$c = $a;
$c = $a;
$c = $b;
$c = $c;
$c = $d;
$c = $e;


$e = 'ololo';

//echo $a.$b.'jhg';

chto('zlo', $b, $d, $d);