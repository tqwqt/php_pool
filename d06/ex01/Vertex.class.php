<?php
require_once '../ex00/Color.class.php';

class Vertex
{
    public static $verbose = FALSE;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;


    public function __construct($coords)
    {
        if (isset($coords['x']))
        {
            $this->_x = $coords['x'];
        }
        if (isset($coords['w']))
        {
            $this->_w = $coords['w'];
        }
        if (isset($coords['y']))
        {
            $this->_y = $coords['y'];
        }
        if (isset($coords['z']))
        {
            $this->_z = $coords['z'];
        }
        if (isset($coords['color']))
        {
            $this->_color = $coords['color'];
        }
        else
        {
            $this->_color = new Color(array('rgb' => 0xffffff));
        }
        if(Vertex::$verbose === TRUE)
        {
            print($this . " constructed" . PHP_EOL);
        }

    }

    public function getX()
    {
        return $this->_x;
    }

    public function setX($x)
    {
        $this->_x = $x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function setY($y)
    {
        $this->_y = $y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function setZ($z)
    {
        $this->_z = $z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function setW($w)
    {
        $this->_w = $w;
    }

    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }

    function __toString()
    {
        if (Vertex::$verbose === TRUE)
            return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        else
            return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public static function doc()
    {
        return file_get_contents("Vertex.doc.txt");
    }
    public function __destruct()
    {
        if(Vertex::$verbose == TRUE)
        {
            print($this . " destructed" . PHP_EOL);
        }
    }
}