#!/usr/bin/php
<?PHP
$i = 1;
$arr = str_word_count($argv[1], 1, '!"#$%&\'()*+,.-/0123456789:;<=>?@[\]^_`{|}~');
while ($arr[$i]) 
{
	echo $arr[$i]." ";
	$i++;	
}
$i = 0;
echo $arr[$i]."\n";
?>