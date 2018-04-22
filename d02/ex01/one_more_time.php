#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$m_reg = "janvier|février|mars|avril|mai|juin|juillet|août|septembre|octobre|novembre|décembre";
$month = array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre");
$day = array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche");
$d_reg = "lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche";
echo $err = preg_match("/^($d_reg) ([1-9]|0[1-9]|[1-2][0-9]|3[0-1]) ($m_reg) (\d{4}) ((?:[0-1][0-9]|2[0-3]):(?:[0-5]\d):(?:[0-5]\d))$/i", $argv[1], $arr)."\n";

$time = explode(":",$arr[5]);
$d_num = -1;
$m_num = -1;
$m_num = array_search(strtolower($arr[3]), $month);
$d_num = array_search(strtolower($arr[1]), $day);
$err = 0;
echo "err=$err\n";
if ($m_mum == -1 || $d_num == -1)
	$err = 1;
echo "err=$err\n";
$ret = mktime($time[0], $time[1],$time[2] , $m_num+1, $arr[2], $arr[4]);
echo date("N", $ret)." ".($d_num + 1)."\n";
if (($d_num+1) != date("N", $ret))
	$err = 1;
echo "err=$err\n";
if (ctype_lower(substr($arr[3], 1)) == 0 || ctype_lower(substr($arr[1], 1)) == 0 || $err != 0)
{
	print ("Wrong Format\n");
	exit();
}
print_r($arr);
echo $arr[3]."\n";
echo "ret=".mktime($time[0], $time[1],$time[2] , $m_num+1, $arr[2], $arr[4])."\n";//$hour = date("H") [, int $minute = date("i") [, int $second = date("s") [, int $month = date("n") [, int $day = date("j") [, int $year = 
echo "ret2=".mktime(12, 02,21 , 11, 12, 2019)."\n";
echo "dt=".date(DATE_RFC822, $ret);
//echo "strtto=".strtotime("12 Novembre 2013 12:02:21")."\n";
//echo date(DATE_RFC822, mktime(12, 2,21 , 11, 12, 2013))."\n";
// $replace = ' ';
// $new = preg_replace($reg, $replace, trim($argv[1]));
// echo $new."\n";
?>