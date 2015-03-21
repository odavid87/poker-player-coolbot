<?php

class FlushValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        foreach ($this->suits as $suit) {
            if (count($suit) > 4) return true;
        }
        return false;
    }
}
