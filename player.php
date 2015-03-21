<?php

class Player
{
    const VERSION = "Default PHP folding player";
	const MY_NAME = "coolbot";

    public function betRequest($gameState)
    {
		#$game = new Game($gameState);
		#var_dump($this->getMySelf($game));

        return $this->betAmount($this->raiseMinimum($gameState));
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

	private function getMySelf($game)
	{
		return $game->getPlayerByName('coolbot');
	}
}
