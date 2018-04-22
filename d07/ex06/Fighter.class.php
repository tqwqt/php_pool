<?php

abstract class Fighter
{
    private $type = 'none';

    public function getType()
    {
        return $this->type;
    }

    public function __construct($type)
    {
        $this->type = $type;
    }

    abstract function fight($t);
}