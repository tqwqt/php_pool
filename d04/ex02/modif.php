<?php
if (!is_empty($_POST['login']) && !is_empty($_POST['oldpw']) && !is_empty($_POST['newpw']) && $_POST['submit'] === "OK")
{
	$to_push = unserialize(file_get_contents("../private/passwd"));
	if ($to_push)
	{
		foreach ($to_push as $key => $value) {
			if ($value['login'] === $_POST['login'] && hash( "whirlpool",$_POST['oldpw']) === $value['passwd'])
			{
				$entry['passwd'] = hash("whirlpool", $_POST["newpw"]);
				$entry['login'] = $_POST['login'];
				$to_push[$key] = $entry;
				file_put_contents("../private/passwd",serialize($to_push));
				echo "OK\n";
				$flag = 1;
				return ;
			}
		}
	} 
	if ($flag != 1)
		echo "ERROR\n";
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