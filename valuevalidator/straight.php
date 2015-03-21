<?php
class StraightValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        $values = array_keys($this->ranks);
        sort($values);
        
        $total = 1;
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
