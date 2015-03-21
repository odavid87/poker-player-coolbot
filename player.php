<?php

class Player
{
    const VERSION = "Default PHP folding player";

    public function betRequest($game_state)
    {
        return $this->raiseMinimum($game_state);
    }

    public function showdown($game_state)
    {
    }

    private function raiseMinimum($gameState)
    {
        return (int) $gameState['minimum_raise'];
    }
}
