<?php


namespace App\Game\Event;


use App\Game\Player\Army;

class Earthquake extends Event
{
    private $maxPersentageOfCasualties = 40;


    public function calculate($numArmy1, $numArmy2)
    {
        $persentageOfCasualties = rand(1, $this->maxPersentageOfCasualties);

        $calcArmy1 = $this->formula($numArmy1, $persentageOfCasualties);
        $calcArmy2 = $this->formula($numArmy2, $persentageOfCasualties);

        return [$calcArmy1, $calcArmy2];
    }

}