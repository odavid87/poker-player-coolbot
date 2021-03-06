<?php
class MyHand
{
    const HIGH_VALUE = 20;
    /**
     * @var array
     */
    private $cards;

    public function __construct(array $cards)
    {
        $this->cards = array(
            new Card($cards[0]),
            new Card($cards[1]),
        );
    }

    public function hasHighPair()
    {
        return $this->isAPair() && $this->isHighValue();
    }

    public function hasPotential()
    {
        return ($this->isAPair() && $this->isHighValue())
            || ($this->isSameSuit() && $this->isHighValue())
            || ($this->isConnected() && $this->isHighValue());
    }

    public function isAPair()
    {
        return $this->cards[0]->getRank() == $this->cards[1]->getRank();
    }

    public function isSameSuit()
    {
        return $this->cards[0]->getSuit() == $this->cards[1]->getSuit();
    }

    public function isConnected()
    {
        // ace with 2 or K
        if ($this->cards[0]->isAce()
            && ($this->cards[1]->getValue() == 2
                || $this->cards[1]->getRank() == "K")
        ) {
            return true;
        }

        // ace with 2 or K
        if ($this->cards[1]->isAce()
            && ($this->cards[0]->getValue() == 2
                || $this->cards[0]->getRank() == "K")
        ) {
            return true;
        }

        // two number cards
        $diff = abs($this->cards[0]->getValue() - $this->cards[1]->getValue());
        return $diff == 1;
    }

    public function isHighValue()
    {
        $c1Value = $this->cards[0]->isFigure() ? 10 : $this->cards[0]->getRank();
        $c2Value = $this->cards[1]->isFigure() ? 10 : $this->cards[1]->getRank();

        return $c1Value + $c2Value >= self::HIGH_VALUE;
    }

    /**
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }
}
