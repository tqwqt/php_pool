<?php

class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    public static $verbose = false;


    public function __construct(array $input)
    {
        $vertex = $input['dest'];
        $this->_x = $vertex->getX();
        $this->_y = $vertex->getY();
        $this->_z = $vertex->getZ();
        if ($vertex->getW() !== NULL)
        {
            $this->_w = $vertex->getW();
        }
        $orig = isset($input['orig']) ? $input['orig'] : new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0));
        $this->_x -= $orig->getX();
        $this->_y -= $orig->getY();
        $this->_z -= $orig->getZ();
        $this->_w -= $orig->getW();
        if (Vector::$verbose)
            print($this . " constructed" . PHP_EOL);
    }

    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function __toString()
    {
        return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
    }
    public static function doc()
    {
        return file_get_contents("Vector.doc.txt");
    }
    public function magnitude()
    {
        return (abs(sqrt(($this->_x * $this->_x)+($this->_y * $this->_y)+($this->_z * $this->_z))));
    }

    public function normalize()
    {
        $len = $this->magnitude();
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $len,'y' => $this->_y / $len, 'z' => $this->_z / $len))));
    }

    public function add(Vector $rhs)
    {
        return new Vector(['dest' => new Vertex(array('x' => $this->_x + $rhs->getX(), 'y' => $this->_y + $rhs->getY(), 'z' => $this->_z + $rhs->getZ()))]);
    }
    public function sub(Vector $rhs)
    {
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->getX(), 'y' => $this->_y - $rhs->getY(), 'z' => $this->_z - $rhs->getZ()))));
    }
    public function opposite()
    {
        return new Vector(['dest' => new Vertex(['x' => $this->_x * (-1), 'y' => $this->_y * (-1), 'z' => $this->_z * (-1)])]);
    }
    public function scalarProduct($k)
    {
        return new Vector(['dest' => new Vertex(['x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k])]);
    }
    public function dotProduct(Vector $rhs)
    {
        return (($this->_x * $rhs->getX()) + ($this->_y * $rhs->getY()) + ($this->_z * $rhs->getZ()));
    }
    public function cos(Vector $rhs)
    {
        return (($this->dotProduct($rhs)) / ($this->magnitude() * $rhs->magnitude()));
    }
    public function crossProduct(Vector $rhs)
    {
        return new Vector(['dest' => new Vertex(['x' => $this->_y * $rhs->getZ() - $this->getZ() * $rhs->getY(), 'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(), 'z' => $this->_x * $rhs->getY()
            - $this->_y * $rhs->getX()])]);
    }
    public function __destruct()
    {
        if(Vector::$verbose === true)
        {
            print($this . " destructed" . PHP_EOL);
        }
    }
    
}