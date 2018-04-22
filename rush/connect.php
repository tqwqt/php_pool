<?php

$link = mysqli_connect('localhost', 'vhavryle', 'vhavryle','electronics');

if (mysqli_connect_errno())
{
	echo "ERROR connect to DB  ('.mysqli_connect_errno().'): ".mysqli_connect_error();
	exit();
}
else
{
	//echo "OK\n";
}


?>