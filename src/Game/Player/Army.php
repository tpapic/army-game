<?php


namespace App\Game\Player;


class Army
{
    private $numOfSolders;
    private $numOfSoldersLeft;


    public function __construct(int $numOfSolders)
    {
        $this->numOfSolders = $numOfSolders;
        $this->numOfSoldersLeft = $numOfSolders;
    }

    /**
     * @return int
     */
    public function getNumOfSoldersLeft(): int
    {
        return $this->numOfSoldersLeft;
    }

    /**
     * @param int $numOfSoldersLeft
     */
    public function setNumOfSoldersLeft(int $numOfSoldersLeft): void
    {
        $this->numOfSoldersLeft = $numOfSoldersLeft;
    }


}