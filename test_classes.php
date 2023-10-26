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

$constants = get_defined_constants(true);

$debugger->output($constants);

echo "<hr>";
?>