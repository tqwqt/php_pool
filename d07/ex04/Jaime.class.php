<?php

class Jaime extends Lannister
{
    public function sleepWith($o)
    {
        if ($o instanceof Tyrion)
            print("Not even if I'm drunk !\n");
        if ($o instanceof Sansa)
            print("Let's do this.\n");
        if ($o instanceof Cersei)
            print("With pleasure, but only in a tower in Winterfell, then.\n");
    }
}