<?php


namespace App\Game\Event;


abstract class Event
{

    public function getNameOfEvent()
    {
        $path = explode('\\', static::class);
        return array_pop($path);

    }

    abstract public function calculate($numArmy1, $numArmy2);

    protected function formula(int $numArmy, int $persentage) {
        return ((100 - $persentage) / 100) * $numArmy;
    }
}