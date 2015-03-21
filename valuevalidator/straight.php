<?php
class StraightValueValidator extends AbstractValueValidator
{
    public function isValid(array $cards)
    {
        $this->fillRanks($cards);
        
        $values = array_keys($this->ranks);
        sort($values);
        
        $total = 0;
        $prev = -1;
        foreach ($values as $value) {
            if ($prev + 1 == $value)
            {
                $total++;
            }
            $prev = $value;
        }
        
        return $total >= 5;
    }
}