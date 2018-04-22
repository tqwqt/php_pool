<?php
if (!is_empty($_POST['login']) && !is_empty($_POST['passwd']) && $_POST['submit'] === "OK")
{
	if (file_exists("../private") === FALSE)
		mkdir("../private");
	$to_push = unserialize(file_get_contents("../private/passwd"));
	if ($to_push)
	{
		foreach ($to_push as $value) {
			if ($value['login'] === $_POST['login'])
			{
				$flag = 1;
				echo "ERROR\n";
			}
		}
	}
	if ($flag != 1)
	{
		$pas = hash("whirlpool", $_POST["passwd"]);
		$log = $_POST['login'];
		$entry['login'] = $log;
		$entry['passwd'] = $pas;
		$to_push[] = $entry;
		file_put_contents("../private/passwd",serialize($to_push));
		echo "OK\n";
	}
}
else
{
	echo "ERROR\n";
}

function is_empty($v)
{
	return $v === NULL || $v === "";
}

?>