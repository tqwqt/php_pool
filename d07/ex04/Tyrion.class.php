<?php

class Tyrion extends Lannister
{
    public function sleepWith($o)
    {
        if ($o instanceof Jaime)
            print("Not even if I'm drunk !\n");
        if ($o instanceof Sansa)
            print("Let's do this.\n");
        if ($o instanceof Cersei)
            print("Not even if I'm drunk !\n");
    }
}