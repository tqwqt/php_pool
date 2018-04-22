#!/usr/bin/php
<?PHP
function ft_split($str)
{
	$arr = explode(" ", $str);
	$arr = array_filter($arr, 'strlen');
	return $arr;
}
function ft_cmp($a_mix, $b_mix)
{
	$it = 0;
	$a = strtolower($a_mix);
	$b = strtolower($b_mix);
	while ($a[$it] == $b[$it] && $a[$it] != NULL)
	{
		$it++;
	}
	if ($a[$it] == NULL && $b[$it] == NULL)
	{
		return 0;
	}
	else if ($a[$it] == NULL && $b[$it] != NULL)
			return (-1);
	else if ($b[$it] == NULL && $a[$it] != NULL)
			return (1);
	if (ft_getgroup($a[$it]) > ft_getgroup($b[$it])){
		
		return (-1);
	}
	elseif (ft_getgroup($a[$it]) == ft_getgroup($b[$it])) {
		if ($a[$it] < $b[$it])
			return -1;
		else
			return 1;
	}
	return 1;
}
function ft_getgroup($c)
{
	if (ft_cisalp($c))
		return 3;
	if (ft_cisnum($c))
		return 2;
	return 1;
}
function ft_cisalp($c)
{
	if ((ord($c) >= 65 && ord($c) <= 90) || (ord($c) >= 97 && ord($c) <= 123))
		return 1;
	return 0;
}
function ft_cisnum($c)
{
	if (ord($c) >= 48 && ord($c) <= 57)
		return 1;
	return 0;
}
$i = 1;
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

usort($arr, "ft_cmp");
foreach ($arr as $el) 
{
	print("$el\n");
}

?>