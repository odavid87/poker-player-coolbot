<?php
abstract class AbstractBetStrategy
{
    abstract public function betRequest(Game $game);

    protected function betAmount($amount)
    {
        return (int) $amount;
    }
}