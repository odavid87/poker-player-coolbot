<?php

class Player
{
    const VERSION = "Default PHP folding player";
	const NAME = 'coolbot';

    public function betRequest($game_state)
    {
		var_dump($this->getMySelf($game_state));
        return $this->betAmount($this->raiseMinimum($game_state));
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

	private function getMySelf($gameState)
	{
		foreach($gameState['players'] as $player)
		{
			if ($player['name'] == $Player::NAME)
			{
				return $player;
			}
		}
	}
}
