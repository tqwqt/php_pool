<?php
    
     require_once 'connect.php';
     require_once 'functions.php';
     //require_once 'create_user.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
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
    <div class="admin">

    <div class="admin_sidebar" style="padding-left: 40px;">

    <p style="font-family: 'Times New Roman', Times, serif; font-size: 40px;">Admin actions:</p> 
   <br>
    <form method="post" name="" action="registr.php">
    <input style="background-color: #e7e7e7; color: black; border-radius: 12px; font-size: 20px; border: 2px solid #4CAF50;" type="submit" name="add_user" value="Add user"/>
    </form>

    <form method="post" name="" action="del_user.php">
    <input style="background-color: #e7e7e7; color: black; border-radius: 12px; font-size: 20px; border: 2px solid #4CAF50;" type="submit" name="del_user" value="Delete user"/>
    </form>

    <form method="post" name="" action="add_item.php">
    <input style="background-color: #e7e7e7; color: black;border-radius: 12px; font-size: 20px; border: 2px solid #4CAF50;" type="submit" name="add_item" value="Add item to the shop"/>
    </form>
    <form method="post" name="" action="show_all_users.php">
    <input style="background-color: #e7e7e7; color: black; border-radius: 12px; font-size: 20px; border: 2px solid #4CAF50;" type="submit" name="show_all" value="Show all the users"/>
    </form>
    </div>
     </div>
    </div>
    <div class="footer">&copy; vtolochk && vhavryle</div>
</body>
</html>