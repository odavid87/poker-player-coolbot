<?php
abstract class AbstractValueValidator
{
    protected $ranks;

    abstract public function isValid(array $cards);

    protected function getNumberOfPairs(array $cards)
    {
        $this->fillRanks($cards);

        $numberOfPairs = 0;
        foreach ($this->ranks as $rankValue) {
            if ($rankValue > 1) $numberOfPairs++;
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
}