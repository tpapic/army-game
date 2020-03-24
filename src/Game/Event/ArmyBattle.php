<?php


namespace App\Game\Event;


class ArmyBattle extends Event
{

    private $maxPersentageOfCasualties = 60;

    public function calculate($numArmy1, $numArmy2)
    {
        $persentageOfCasualtiesArmy1 = rand(1, $this->maxPersentageOfCasualties);
        $persentageOfCasualtiesArmy2 = rand(1, $this->maxPersentageOfCasualties);

        $calcArmy1 = $this->formula($numArmy1, $persentageOfCasualtiesArmy1);
        $calcArmy2 = $this->formula($numArmy2, $persentageOfCasualtiesArmy2);

        return [$calcArmy1, $calcArmy2];
    }
}