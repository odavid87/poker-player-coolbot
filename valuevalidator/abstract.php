<?php
abstract class AbstractValueValidator
{
    protected $ranks;
    protected $suits;

    abstract public function isValid(array $cards);

    protected function getNumberOfPairs(array $cards)
    {
        $this->fillRanks($cards);

        $numberOfPairs = 0;
        foreach ($this->ranks as $rankValue) {
            if ($rankValue == 2) $numberOfPairs++;
        }
        return $numberOfPairs;
    }

    /**
     * @param array $cards
     */
    protected function fillRanks(array $cards)
    {
        foreach ($cards as $card) {
            $this->ranks[$card->getRank()]++;
        }
    }

    protected function fillSuits($cards)
    {
        foreach ($cards as $card) {
            $this->suits[$card->getSuit()][] = $card;
        }
    }
}