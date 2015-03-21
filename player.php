<?php

class Player
{
    const VERSION = "Default PHP folding player";

    public function betRequest($game_state)
    {
		return 1000;
    }

    public function showdown($game_state)
    {
    }

    private function raiseMinimum($gameState)
    {
        return $gameState['current_buy_in'] + $gameState['minimum_raise'];
    }

    private function betAmount($amount)
    {
        return (int) $amount;
    }
}
