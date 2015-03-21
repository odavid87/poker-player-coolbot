<?php
class HandState
{
    private $communityCards;

    /**
     * @param array $communityCards
     */
    public function __construct(array $communityCards)
    {
        $this->communityCards = $communityCards;
    }

    public function isPreFlop()
    {
        return empty($this->communityCards);
    }

    public function isFlop()
    {
        return 3 === count($this->communityCards);
    }

    public function isTurn()
    {
        return 4 === count($this->communityCards);
    }

    public function isRiver()
    {
        return 5 === count($this->communityCards);
    }
}