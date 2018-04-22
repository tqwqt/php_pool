#!/usr/bin/php

<?PHP
function ft_split($str)
{
	$arr = explode(" ", $str);
	$arr = array_filter($arr, 'strlen');
	sort($arr);
	return $arr;
}
?>