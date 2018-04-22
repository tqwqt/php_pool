<?php
    if ("zaz" == $_SERVER[PHP_AUTH_USER] && "jaimelespetitsponeys" == $_SERVER[PHP_AUTH_PW] )
    {
         $get = file_get_contents("../img/42.png");
         $code = base64_encode($get);
         header('Content-Type: text/html');
         echo "<html><body>\n";
         echo "Hello Zaz<br />\n<img src='data:image/png;base64,";
         echo $code;
         echo "'>\n</body></html>\n";
    }
    else
    {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header("HTTP/1.0 401 Unauthorized");
        echo "<html><body>That area is accessible for members only</body></html>";
    }
?>