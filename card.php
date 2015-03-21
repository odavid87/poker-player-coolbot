<?php
class Card
{
    private $rank;
    private $suit;

    public function __construct(array $card)
    {
        $this->suit = $card['suit'];
        $this->rank = $card['rank'];
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    public function isFigure()
    {
        return !is_numeric($this->rank);
    }

    public function isAce()
    {
        return $this->rank == "A";
    }

    public function getValue()
    {
        return !$this->isFigure() ? $this->rank : $this->getNumericValueOfFigure();
    }

    private function getNumericValueOfFigure()
    {
        switch ($this->rank) {
            case "J" :
                return 11;
                break;
            case "Q" :
                return 12;
                break;
            case "K" :
                return 13;
                break;
            case "A" :
                return 14;
                break;
        }
    }
}