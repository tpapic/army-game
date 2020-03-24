<?php


namespace App\Game;


use App\Game\Event\ArmyBattle;
use App\Game\Event\Earthquake;
use App\Game\Event\Event;
use App\Game\Event\SoldersPoisoning;
use App\Game\Player\Army;

class GameMaker
{
    private $army1;
    private $army2;

    private $unexpectedEvents = [];
    private $battleEvent;

    public function __construct(int $army1, int $army2)
    {
        $this->army1 = new Army($army1);
        $this->army2 = new Army($army2);

        $this->battleEvent = new ArmyBattle();

        $this->setAllUnexpectedEvents();
    }

    public function start()
    {
        $roundCount = 0;
        $outputGameData = [];

        while($this->army1->getNumOfSoldersLeft() > 0 && $this->army2->getNumOfSoldersLeft() > 0)
        {
            $numArmy1 = $this->army1->getNumOfSoldersLeft();
            $numArmy2 = $this->army2->getNumOfSoldersLeft();

            if($this->useUnexpectedEvent())
            {

                $event = $this->getRandomEvent();
                $outputGameData[$roundCount][] = 'Event - ' . $event->getNameOfEvent();

                $calcNumOfSolders = $event->calculate($numArmy1, $numArmy2);

            }
            else {

                $calcNumOfSolders = $this->battleEvent->calculate($numArmy1, $numArmy2);

            }

            $this->army1->setNumOfSoldersLeft($calcNumOfSolders[0]);
            $this->army2->setNumOfSoldersLeft($calcNumOfSolders[1]);

            $outputGameData[$roundCount][] = 'Army1 solders left: ' . $this->army1->getNumOfSoldersLeft() . ', Army2 solders left: ' . $this->army2->getNumOfSoldersLeft();

            if(!$this->army1->getNumOfSoldersLeft()) {
                $outputGameData[$roundCount][] = 'Army2 won the battle!!!';
            } else if(!$this->army2->getNumOfSoldersLeft()){
                $outputGameData[$roundCount][] = 'Army1 won the battle!!!';
            }

            $roundCount++;
        }

        return $outputGameData;
    }

    private function useUnexpectedEvent() :bool {
        $randNum = rand(0, 1000);
        return $randNum > 500;
    }

    private function getRandomEvent() :Event
    {
        $countEvents = count($this->unexpectedEvents);

        $randomEventIndex = rand(0, $countEvents - 1);

        return $this->unexpectedEvents[$randomEventIndex];
    }

    private function setAllUnexpectedEvents() {
        $this->unexpectedEvents = [new Earthquake(), new SoldersPoisoning()];
    }


    public function setUnexpectedEvents(array $unexpectedEvents): void
    {
        $this->unexpectedEvents = $unexpectedEvents;
    }


    public function setBattleEvent(Event $battleEvent): void
    {
        $this->battleEvent = $battleEvent;
    }


}