<?php
class StraightFlushValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        $flushValidator = new FlushValueValidator($this->cards);
        if ($flushValidator->isValid()) {
            $suitedCards = $this->getSuitedCards();
            $straightValidator = new StraightValueValidator($this->cards);
            return $straightValidator->isValid();
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
