<?php


class Tyrion extends Lannister {

    public function __construct()
    {
        parent::__construct();
        $this->sayMyMame();
    }

    public function sayMyMame()
    {
        echo 'My name is Tyrion' ."\n";
    }

    public function getSize()
    {
        return 'Short';
    }
}