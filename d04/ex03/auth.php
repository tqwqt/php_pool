<?php

function auth($login, $passwd)
{
	$to_push = unserialize(file_get_contents("../private/passwd"));
	foreach ($to_push as $key => $value) {
		if ($value['passwd'] === hash('whirlpool',$passwd) && $value['login'] === $login)
		{
			return TRUE;
		}
	}
	return FALSE;
}
?>