<?php

require_once("PHPUtils/_All.php");

// $gen = new Random;
// echo $gen->genStr();

$gui = new Resources;
$gui->Bootstrap();

$str = " this is a longer. string;)";
$strings = new Strings;
echo $strings->slugify($str);

echo $strings->hide($str);


$debugger = new Debugger;

$debugger->output("Hi");

echo "<hr>";

$debugger->output();

print_r(get_defined_constants(true))['user'];


print_r(get_defined_constants(true))['user'];
?>