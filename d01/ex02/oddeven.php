#!/usr/bin/php
<?PHP

    $fd = fopen("php://stdin", "r");
    while(2)
    {
        echo "Enter a number: ";
        $str = fgets($fd);
        $str = rtrim($str);
        if (feof($fd) == 1)
        {
            print("\n");
            exit();
        }
        if (is_numeric($str))
        {
            if ($str % 2 != 0)
                echo "The number $str is odd\n";
            else
                echo "The number $str is even\n";
        }
        else
            print("$str is not a number\n");
    }
fclose($fd);
?>