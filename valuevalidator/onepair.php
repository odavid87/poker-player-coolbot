<?php
class OnePairValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        return 1 == $this->getNumberOfPairs();
    }
}
