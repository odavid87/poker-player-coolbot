<?php
class OnePairValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        return 1 == $this->getNumberOfPairs($cards);
    }
}