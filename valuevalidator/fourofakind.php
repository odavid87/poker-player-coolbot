<?php
abstract class FourOfAKind
{
    public function isValid(array $cards)
    {
        foreach ($this->ranks as $rank) {
            if ($rank == 4) return true;
        }
    }
}