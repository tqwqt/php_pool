#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$origin = $tab;
	$tmp = $tab;
	sort($tmp);
	rsort($tab);
	if ($tmp === $origin)
		return 1;
	if ($tab === $origin)
		return 1;
    return 0;
}
?>