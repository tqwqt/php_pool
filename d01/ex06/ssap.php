#!/usr/bin/php
<?PHP
$i = 1;
function ft_split($str)
{
	$arr = explode(" ", $str);
	$arr = array_filter($arr, 'strlen');
	return $arr;
}
$arr_arv = ft_split($argv[$i]);
$arr = $arr_arv;
unset($arr_arv);
$i++;
while ($argc--)
{
	$arr_arv = ft_split($argv[$i]);
	$arr = array_merge($arr, $arr_arv);
	$i++;
}
sort($arr);
foreach ($arr as $el) 
{
	print("$el\n");
}
?>