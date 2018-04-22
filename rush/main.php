<?php
    
     require_once 'connect.php';
     require_once 'functions.php';
     //require_once 'create_user.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
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
        <div class="descr"><p>
        Welcome to UNIT-box, your number one source for all things laptops, computers, monitors, etc. We're dedicated to giving you the very best of our product, with a focus on dependability, customer service and uniqueness.

Founded in 2018 by vtolochk && vhavryle, UNIT-box has come a long way from its beginnings in a UNIT Factory. When vhavryle first started out, his passion for providing the best equipment for his fellow proggramers drove him to do intense research, and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over the world, and are thrilled to be a part of the fair trade wing of the IT industry.

We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
<br>
<br>
Sincerely,
vtolochk && vhavryle.
</p>
        </div>
        <h2>Latest products</h2>
        <?php 
$prod = show_all_products($link);?>
<?php foreach ($prod as $c): ?>
<div class="item">

<div class="div_but"> <input class="but" type="button" name="add_item" value="Add to basket">
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