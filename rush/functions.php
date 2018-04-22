<?php
function is_empty($v)
{
	return $v === NULL || $v === "";
}

function get_cats($link)
{
$sql = "SELECT * FROM products";
$result = mysqli_query($link, $sql);

$data = mysqli_fetch_all($result, 1);
return $data;
}

function add_user($email, $pass, $login, $link)
{
	//$sql = "INSERT INTO `users` (`login`, `passwd`, `mail`) VALUES (\'test1\', \'pass1\', \'email1\')";
	$email = mysqli_real_escape_string($link, $email);
	$login = mysqli_real_escape_string($link, $login);
	$pass = mysqli_real_escape_string( $link, $pass);
	$quer = "SELECT * FROM users WHERE login = '$login'";
	$result = mysqli_query($link, $quer);
	$num_rows = mysqli_num_rows($result);
	if (!$num_rows)
	{	
		$pass = hash("whirlpool", $pass);
		$insert_query = "INSERT INTO users (login, mail, passwd) VALUES('$login', '$email', '$pass')";
		$result = mysqli_query($link, $insert_query);
		if ($result)
			return 'created';
		else
			return 'fail';
	}
	else
	{
		return "exist";
	}
}

function remove_user($login, $link)
{
	//$sql = "INSERT INTO `users` (`login`, `passwd`, `mail`) VALUES (\'test1\', \'pass1\', \'email1\')";
//	$email = mysqli_real_escape_string($link, $email);
//	$login = mysqli_real_escape_string($link, $login);
	//$pass = mysqli_real_escape_string( $link, $pass);
	$quer = "SELECT * FROM users WHERE login = '$login'";
	$result = mysqli_query($link, $quer);
	$num_rows = mysqli_num_rows($result);
	echo "num=$num_rows";
	if ($num_rows)
	{	
		$delete_query = "DELETE FROM users WHERE login = '$login'";
		$result = mysqli_query($link, $delete_query);
		echo "result";
		// if ($result)
		// 	return 'created';
		// else
		// 	return 'fail';
	}
	else
	{
		return "exist";
	}
}

function add_product($name, $brand, $categ, $descrip, $img, $price, $link)
{
	//$sql = "INSERT INTO `products` (`id`, `name`, `brand`, `categ`, `descrip`, `img`, `seo_w`, `seo_descp`, `p_cat_fk`, `price`) VALUES (NULL, \'name\', \'brand\', \'categ\', \'descp\', \'url\', \'plain\', \'plain\', \'0\', \'100\')";


	$name = mysqli_real_escape_string($link, $name);
	$brand = mysqli_real_escape_string($link, $brand);
	$categ = mysqli_real_escape_string( $link, $categ);
	$price = mysqli_real_escape_string( $link, $price);
	$descrip = mysqli_real_escape_string( $link, $descrip);
	$img = mysqli_real_escape_string( $link, $img);
	$quer= "SELECT * FROM products WHERE name = '$name'";
	$result = mysqli_query($link, $quer);
	$num_rows = mysqli_num_rows($result);
	if (!$num_rows)
	{	
		$insert_query = "INSERT INTO products (name, brand, categ, descrip, img, price ) VALUES('$name', '$brand', '$categ', '$descrip', '$img', '$price')";
		$result = mysqli_query($link, $insert_query);
		if ($result)
			return 'created';
		else
			return 'fail';
	}
	else
	{
		return "exist";
	}
}

function edit_product($id, $name, $brand, $categ, $descrip, $img, $price, $link)
{
	//$sql = "INSERT INTO `products` (`id`, `name`, `brand`, `categ`, `descrip`, `img`, `seo_w`, `seo_descp`, `p_cat_fk`, `price`) VALUES (NULL, \'name\', \'brand\', \'categ\', \'descp\', \'url\', \'plain\', \'plain\', \'0\', \'100\')";


	$name = mysqli_real_escape_string($link, $name);
	$brand = mysqli_real_escape_string($link, $brand);
	$categ = mysqli_real_escape_string( $link, $categ);
	$price = mysqli_real_escape_string( $link, $price);
	$descrip = mysqli_real_escape_string( $link, $descrip);
	$img = mysqli_real_escape_string( $link, $img);
	$quer= "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($link, $quer);
	$num_rows = mysqli_num_rows($result);
	if ($num_rows)
	{	
		$insert_query = "UPDATE products SET name = '$name', brand = '$brand', categ = '$categ', descrip = '$descrip', img = '$img', price = '$price' WHERE id = '$id'";
		$result = mysqli_query($link, $insert_query);
		if ($result)
			return 'edited';
		else
			return 'fail';
	}
	else
	{
		return "!exist";
	}
}
function remove_prod($id, $link)
{
	$id = mysqli_real_escape_string($link, $id);
	$quer = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($link, $quer);
	$num_rows = mysqli_num_rows($result);
	echo "num=$num_rows";
	if ($num_rows)
	{	
		$delete_query = "DELETE FROM products WHERE id = '$id'";
		$result = mysqli_query($link, $delete_query);
		echo "result";
		if ($result)
		 	return 'deleted';
		 else
		 	return 'fail';
	}
	else
	{
		return "nonexist";
	}
}
function find_by($table, $by_this, $link, $what)
{
	$what = mysqli_real_escape_string($link, $what);
	$by_this = mysqli_real_escape_string($link, $by_this);
	$table =  mysqli_real_escape_string($link, $table);
	$quer = "SELECT * FROM $table WHERE $what='$by_this'";
	$result = mysqli_query($link, $quer);
	$data = mysqli_fetch_all($result, 1);
	return $data;
}
function show_all_users($link)
{
	$quer = "SELECT * FROM users";
	$result = mysqli_query($link, $quer);
	$data = mysqli_fetch_all($result, 1);
	return $data;
}
function show_all_products($link)
{
	$quer = "SELECT * FROM products";
	$result = mysqli_query($link, $quer);
	$data = mysqli_fetch_all($result, 1);
	return $data;
}
function add_to_basket($prod_id, $user_id, $link)
{
	$prod_id = mysqli_real_escape_string( $link, $prod_id);
	$user_id = mysqli_real_escape_string( $link, $user_id);
	//$quer= "SELECT * FROM products WHERE name = '$name'";
	//$result = mysqli_query($link, $quer);
	//$num_rows = mysqli_num_rows($result);
	$insert_query = "INSERT INTO basket (b_prod_id, b_user_fk) VALUES('$prod_id', '$user_id')";
	$result = mysqli_query($link, $insert_query);
	//var_dump($result);
	if ($result)
		return 'added';
	else
		return 'fail';
}
function log_in($login, $pass, $link)
{
	session_start();
	if (auth($login, $pass, $link) === TRUE)
	{
		$_SESSION['loggued'] = $login;
		return TRUE;
	}
	else
	{
		session_destroy();
		return FALSE;
	}
}
function auth($login, $pass, $link)
{
	$login = mysqli_real_escape_string($link, $login);
	$quer = "SELECT * FROM users WHERE login = '$login'";
	$result = mysqli_query($link, $quer);
	print_r($result);
	foreach ($result as $value) {
		
		if ($value['login'] == $login )
		{
			$db_pass = $value['passwd'];
			break ;
		}
		
	}

	$num_rows = mysqli_num_rows($result);
	$pass = hash("whirlpool", $pass);
	echo "db=$db_pass\n";
	echo "inpass=$pass\n";
	if ($db_pass == $pass)
	{
		echo "tre auth\n";
		return TRUE;
	}
	//19fa61d75522a4669b44e39c1d2e1726c530232130d407f89afee0964997f7a73e83be698b288febcf88e3e03c4f0757ea8964e59b63d93708b138cc42a66eb3 
	//0585a2735748090e5f6b173d4713252017a8c841d7ecdc2669fb6108242c46332e4fc7337090f14c3d81824fd53cb2f00fc5fbe016a180a9fa23ffb8ba468424
	echo "FALSE pass";
	return FALSE;
}
function get_login()
{ 
 session_start();
 if ($_SESSION)
  return $_SESSION['loggued'];
 return "user";
}

function display_basket($link)
{
 if (!isset($_SESSION))
  session_start();
 $login = $_SESSION['loggued'];
 $sql = "SELECT b_prod_id FROM basket WHERE b_user_fk = '$login'";
 $result_id = mysqli_query($link, $sql);
 foreach ($result_id as $value) {
  
  $arr_id[] = $value['b_prod_id'];
 }
 if (!isset($arr_id))
 {
	echo "Your basket is empty!";
	return ;
 }
 	
 foreach ($arr_id as $value) {
  
  $sql = "SELECT * FROM products WHERE id = '$value'";
  $ret = mysqli_query($link, $sql);
  foreach ($ret as $value) {

echo'
	<div style="width: 50%; height: 30%; background: white; margin-bottom: 2%; margin-left: 25%;">
	
	<div class="div_but">
	<input style="" type="submit" name="remove" value="Remove from basket">
	<div style="text-align: center; text-decoration: none; font-size: 16px; margin-top: 1%; margin-left: 70%;">

		   ' .$value['name']. '
			<br>
			' .$value['price']. ' UAH
		   </div></div>
		   <div class="img" style="display:inline-block;">
		   
			  <img style="margin-left:10%; height:170px; width:300px;" src="img/' .$value['img']. '">
		   </div>
		   
			
		   <div class="descr" style="margin-left:1%; margin-top: 1%; padding: 10px; min-height:100px;">
		   ' .$value['descrip']. '
		 
		   </div>
	</div> ';
       
  }
  
 }
}

function display_sum($link)
{
 if (!isset($_SESSION))
  session_start();
 $login = $_SESSION['loggued'];
 $sql = "SELECT b_prod_id FROM basket WHERE b_user_fk = '$login'";
 $result_id = mysqli_query($link, $sql);
 foreach ($result_id as $value) {
  
  $arr_id[] = $value['b_prod_id'];
 }
 $sum = 0;
 foreach ($arr_id as $value) {
  
  $sql = "SELECT * FROM products WHERE id = '$value'";
  $ret = mysqli_query($link, $sql);
  foreach ($ret as $value) {

   $sum += $value['price'];   
  }
  
 }
 return $sum;
}

function sort_by($link, $categ)
{
 $categ = mysqli_real_escape_string( $link, $categ);
 $quer = "SELECT * FROM products WHERE categ = '$categ'";
 $result = mysqli_query($link, $quer);
 $num_rows = mysqli_num_rows($result);
 if ($num_rows)
 {
  if ($result)
   return $result;
  else
   return FALSE;
 }
 else
 {
  return FALSE;
 }
}

function remove_from_basket($id, $link)
{
 $id = mysqli_real_escape_string($link, $id);
 $quer = "SELECT * FROM products WHERE id = '$id'";
 $result = mysqli_query($link, $quer);
 $num_rows = mysqli_num_rows($result);
 if ($num_rows)
 { 
  $delete_query = "DELETE FROM basket WHERE id = '$id'";
  $result = mysqli_query($link, $delete_query);
  if ($result)
    return 'deleted';
   else
    return 'fail';
 }
 else
 {
  return "nonexist";
 }
}

?>