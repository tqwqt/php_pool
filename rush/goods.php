<?php
    
     require_once 'connect.php';
     require_once 'functions.php';
     //require_once 'create_user.php';
?>


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/goods.css">
        <title>UNITbox</title>
    </head>
<body>
    <div class="header">
    <h4>Hello, 
<?php 
    $name = get_login();
     echo "$name!</h4>";
    if ($name !== "user")
    {
        if ($name == "admin")
        {
            echo '<a style="margin-left: 20px;" href="admin.php">Admin area';
        }
        echo '<a style="margin-left: 20px;" href="personal.php">Personal area';
    }
       
?>
    <h1 align="center">UNIT-box electronics store</h1>
    </div>
    <div class="menu">
        <ul class="nav">
           <li class="log"><a href="login.php">LOGIN</a></li>
           <li class="god"><a href="goods.php">GOODS</a>
            <div class="dropdown-content">
                <a href="<?php echo 'goods.php?1'; ?>">Laptops</a>
                <a href="<?php echo 'goods.php?2'; ?>">Computers</a>
                <a href="<?php echo 'goods.php?3'; ?>">Tables</a>
                <a href="<?php echo 'goods.php?4'; ?>">Monitors</a>
                <a href="<?php echo 'goods.php?5'; ?>">Monoblocks</a>
            </div>
            </li>
           <li class="bas"><a href="basket.php">BASKET<br></a></li>
           <li class="abo"><a href="main.php">HOME</a></li>
        </ul>
    </div>
    <div class="content">
<?php 
$id = preg_replace('~\D~', '',  $_SERVER['QUERY_STRING']);
if ($id >= 1 && $id <= 5)
{
    if ($id == 1)
        $prod = sort_by($link, "Laptop");
    if ($id == 2)
        $prod = sort_by($link, "Computers");
    if ($id == 3)
        $prod = sort_by($link, "Tables");
    if ($id == 4)
        $prod = sort_by($link, "Monitor");
    if ($id == 5)
        $prod = sort_by($link, "Monoblock");
}
else
    $prod = show_all_products($link);?>
<?php foreach ($prod as $c):?>
        <div class="item1">
        <form method="post" action="<?php echo 'goods.php?action' . $c['id']; ?>">
        
        <div class="div_but">
        <input class="but" type="submit" name="<?php $c['id']; ?>" value="Add in basket">
        </form>
        <div class="price">

               <?=$c["name"]?>
                <br>
                <?=$c["price"]?> UAH
               </div></div>
               <div class="img" style="display:inline-block;">
               
                  <img style="margin-left:10%; height:170px; width:300px;" src="img/<?=$c["img"]?>">
               </div>
               
                
               <div class="descr" style="margin-left:1%; margin-top: 1%; padding: 10px; min-height:100px;">
              <?=$c["descrip"]?>
             
               </div>
        </div>        
<?php endforeach; ?>


    </div>
    <div class="footer">&copy; vtolochk && vhavryle</div>
</body>
</html>

<?php
 if (isset($_SESSION))
 {
     if (strstr($_SERVER['QUERY_STRING'], "action"))
     {
        $id = preg_replace('~\D~', '',  $_SERVER['QUERY_STRING']); 
        add_to_basket($id, $_SESSION['loggued'], $link);
        echo '<form method="post" action="goods.php"';
     }
}
?>
