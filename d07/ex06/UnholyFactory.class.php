<?php

class UnholyFactory
{
    private $fighters;


    public function absorb($o){

        if ($o instanceof Fighter)
        {
            if (isset($this->fighters) && array_search($o->getType(), $this->fighters) !== FALSE) {

                print("(Factory already absorbed a fighter of type ".$o->getType().")\n");
            }
            else{
                print("(Factory absorbed a fighter of type " . $o->getType() . ")\n");
                $this->fighters[] = $o->getType();
            }
        }
        else
            print("(Factory can't absorb this, it's not a fighter)\n");
    }

    public function fabricate($o){

        if (array_search($o, $this->fighters) !== FALSE)
        {
            print("(Factory fabricates a fighter of type ".$o.")\n");
            if ($o == 'foot soldier')
            {
                return new Footsoldier();
            }
            elseif ($o == 'archer')
            {
               return new Archer();
            }
            elseif ($o == 'assassin')
            {
                return new Assassin();
            }
        }
        else
            print ("(Factory hasn't absorbed any fighter of type ".$o.")\n");
        return NULL;
    }
}