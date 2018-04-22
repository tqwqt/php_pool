<?php

include 'auth.php';
session_start();
if ($_GET['login'] && $_GET['passwd'])
{
	if (auth($_GET['login'], $_GET['passwd']) === TRUE)
	{
		$loggued_on_user = $_GET['login'];
		$_SESSION['loggued_on_user'] = $loggued_on_user;
		echo "OK\n";
		return;
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
		return;
	}
}
?>