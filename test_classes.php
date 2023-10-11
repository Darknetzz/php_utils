<?php

require_once("PHPUtils/_All.php");

// $gen = new Random;
// echo $gen->genStr();



$str = " this is a longer. string;)";
$strings = new Strings;
echo $strings->slugify($str);

echo $strings->hide($str);


$debugger = new Debugger;

$debugger->alert("Hi");

echo "123";
?>