<?php

abstract class House{


    abstract function getHouseName();
    abstract function getHouseSeat();
    abstract function getHouseMotto();

    public function introduce()
    {
        echo "House ".$this->getHouseName()." of ".$this->getHouseSeat()." : \"" .$this->getHouseMotto()."\"\n";
    }

}