#!/usr/bin/php
<?php
$reg = '/[\t, ]+/';
$replace = ' ';
$new = preg_replace($reg, $replace, trim($argv[1]));
echo $new."\n";
?>