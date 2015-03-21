<?php
class FullHouseValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        $onePair = new OnePairValueValidator();
        $drillValidator = new DrillValueValidator();
        return $onePair->isValid($cards) && $drillValidator->isValid($cards);
    }
}