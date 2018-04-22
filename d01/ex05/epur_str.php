#!/usr/bin/php
<?PHP
if ($argc != 2)
{
	echo "lol\n";
	exit (0);
}
$arr = str_word_count($argv[1], 1, '!"#$%&\'()*+,.-/0123456789:;<=>?@[\]^_`{|}~');
$i = 0;
echo "$arr[$i]";
foreach ($arr as $elem ) 
{
	if ($i != 0)
		print(" $elem");
	$i = 1;
}
echo "\n";
?>