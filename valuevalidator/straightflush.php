<?php
class StraightFlushValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        $flushValidator = new FlushValueValidator();
        if ($flushValidator->isValid($cards)) {
            $suitedCards = $this->getSuitedCards();
            $straightValidator = new StraightValueValidator();
            return $straightValidator->isValid($suitedCards);
        }
    }

    /**
     * @return mixed
     */
    protected function getSuitedCards()
    {
        foreach ($this->suits as $suit) {
            if (count($suit) > 4) return $suit;
        }
    }
}