#!/usr/bin/php
<?PHP
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}
$n1 = trim($argv[1]);
$s = trim($argv[2]);
$n2 = trim($argv[3]);
if ($s == "*")
	echo $n1 * $n2."\n";
elseif ($s == "/")
	echo $n1 / $n2."\n";
elseif ($s == "+")
	echo $n1 + $n2."\n";
elseif ($s == "-")
	echo $n1 - $n2."\n";
elseif ($s == "%")
	echo $n1 % $n2."\n";
?>