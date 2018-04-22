<?php

class NightsWatch
{
    private $watchers;


    public function recruit($r)
    {
        $this->watchers[] = $r;
    }
    public function fight()
    {
        foreach ($this->watchers as $watcher) {

            if ($watcher instanceof IFighter)
             $watcher->fight();
        }
    }
}