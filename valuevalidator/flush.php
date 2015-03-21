<?php
class FlushValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        $this->fillSuits($cards);
        foreach ($this->suits as $suit) {
            if ($suit == 5) return true;
        }
    }
}