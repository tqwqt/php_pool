<?php

class Color
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = False;

	function __construct($rgb)
	{
	    if (isset($rgb['rgb']))
        {
            $this->red = (intval($rgb['rgb']) >> 16) & 0xFF;
            $this->green = (intval($rgb['rgb']) >> 8) & 0xFF;
            $this->blue = (intval($rgb['rgb']) >> 0) & 0xFF;
        }
        if (isset($rgb['red']))
            $this->red = intval($rgb['red']) & 0xFF;
        if (isset($rgb['green']))
            $this->green = intval($rgb['green']) & 0xFF;
        if (isset($rgb['blue']))
            $this->blue = intval($rgb['blue']) & 0xFF;
        if (Color::$verbose === True)
            print($this . " constructed." . PHP_EOL);
	}

	public static function doc()
	{
		return file_get_contents("Color.doc.txt");
	}

	public	function add(Color $instance)
	{
		$arr[0] = $instance->red +  $this->red;
		$arr[1] = $instance->green +  $this->green;
	    $arr[2] = $instance->blue + $this->blue;
		return new Color(array('red' => $arr[0], 'green' => $arr[1], 'blue' => $arr[2]));
	}

	function sub(Color $instance)
	{
		$arr[0] = $this->red - $instance->red;
		$arr[1] = $this->green - $instance->green;
		$arr[2] = $this->blue - $instance->blue;
		return  new Color(array('red' => $arr[0], 'green' => $arr[1], 'blue' => $arr[2]));
	}

	function mult($f)
	{

		$arr[0] = $this->red * $f;
		$arr[1] = $this->green * $f;
		$arr[2] = $this->blue * $f;

		return  new Color(array('red' => $arr[0], 'green' => $arr[1], 'blue' => $arr[2]));
	}

	function __toString()
	{
		$str = sprintf("Color( red: % 3d, green: % 3d, blue: % 3d )", $this->red, $this->green, $this->blue);
		return ($str);
	}

	function __destruct()
	{
		if (Color::$verbose === True)
		{
            print($this . " destructed." . PHP_EOL);
		}
	}
}