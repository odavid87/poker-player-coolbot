<?php
class DrillValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        foreach ($this->ranks as $rank) {
            if ($rank == 3) return true;
        }
    }
}