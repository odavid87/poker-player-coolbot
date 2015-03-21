<?php
class TwoPairValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        return 2 == $this->getNumberOfPairs();
    }
}
