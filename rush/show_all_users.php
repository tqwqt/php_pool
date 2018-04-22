<?php
     require_once 'connect.php';
     require_once 'functions.php';
     //require_once 'create_user.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/show_all_users.css">
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
    <?php $users = show_all_users($link);?>

    <div class="content">
        <h2 style="padding-bottom: 20px; margin: auto; padding-top: 20px; text-align:center;">Registered users:</h2>
        <?php foreach ($users as $user): ?>
            <i style="margin-left:45%;">login =</i> 
            <?=$user["login"]?>
            <br>
     <?php endforeach; ?>
    </div>
    
    <div class="footer">&copy; vtolochk && vhavryle</div>
</body>
</html>