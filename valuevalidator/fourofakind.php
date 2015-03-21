<?php
class FourOfAKindValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        foreach ($this->ranks as $rank) {
            if ($rank == 4) return true;
        }
    }
}
