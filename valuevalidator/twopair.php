<?php
class TwoPairValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        return 2 == $this->getNumberOfPairs($cards);
    }
}