<?php
class FlushValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        $this->fillSuits($cards);
        foreach ($this->suits as $suit) {
            if (count($suit) > 4) return true;
        }
        return false;
    }
}