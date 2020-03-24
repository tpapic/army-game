<?php


namespace App\Game\Event;


class SoldersPoisoning extends Event
{

    private $maxPersentageOfCasualties = 50;


    public function calculate($numArmy1, $numArmy2)
    {
        $persentageOfCasualties = rand(1, $this->maxPersentageOfCasualties);

        if($this->army1PoisonedArmy2()) {
            $calcArmy1 = $numArmy1;
            $calcArmy2 = $this->formula($numArmy2, $persentageOfCasualties);
        } else {
            $calcArmy1 = $this->formula($numArmy1, $persentageOfCasualties);
            $calcArmy2 = $numArmy2;
        }

        return [$calcArmy1, $calcArmy2];
    }

    private function army1PoisonedArmy2() :bool {
        return (bool) rand(0, 1);
    }

}