<?php
class DrillValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        foreach ($this->ranks as $rank) {
            if ($rank == 3) return true;
        }
    }
}
