<?php
class FullHouseValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        $onePair = new OnePairValueValidator($this->cards);
        $drillValidator = new DrillValueValidator($this->cards);
        return $onePair->isValid() && $drillValidator->isValid();
    }
}
