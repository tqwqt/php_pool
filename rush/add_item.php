<?php
    
     require_once 'connect.php';
     require_once 'functions.php';
     //require_once 'create_user.php';
?>
<?php 
            if ($_POST && $_POST['submit'] === "ADD")
            {
                $insert_res = add_product($_POST['name'], $_POST['brand'], $_POST['categ'], $_POST['descrip'], $_POST['img'], $_POST['price'], $link); 
               // $header = 'Location: ?add_prod=';
               // $header .= $insert_res;
               // header($header);
            }
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/add_item.css">
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
        <div class="add_form">
            <form method="post" class="fields" action="">
                <p>Name of the item:</p>
                <input style="margin-left:50px; border-radius:10px; padding:3px;" type="text" name="name" value="">
                <p>Brand:</p>
                <input style="margin-left:50px; border-radius:10px; padding:3px;" type="text" name="brand" value="">
                <p>Category:</p>
                <input style="margin-left:50px; border-radius:10px; padding:3px;" type="text" name="categ" value="">
                <p>Price:</p>
                <input style="margin-left:50px; border-radius:10px; padding:3px;" type="text" name="price" value="">
                <p>Description:</p>
                <textarea name="descrip" style="width: 500px; height: 20%; border-radius:10px; margin-left:50px; padding: 0;">
                </textarea>
                <p>Image:</p>
                <input style="margin-left:50px;" type="file" name="img" value="">
                <br>
                <br>
                <input style="margin-left:50px; " type="submit" name="submit" value="ADD">
            </form>
       </div>
    </div>
    <div class="footer">&copy; vtolochk && vhavryle</div>
</body>
</html>