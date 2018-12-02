<?php
require_once('template.php');

$tem = new Template();


$tem->setVariable("a","seta");
$tem->setVariable("b","mono");
$tem->setVariable("c","sata");
$template="{a},{b}";
echo $tem->getHtml($template);

?>