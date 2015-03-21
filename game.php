<?php

class Game
{
	private $dealerId;
	private $players;

	function __construct($gameState)
	{
		$this->dealerId = $gameState['dealer'];
		$this->players = $gameState['players'];
	}

	public function isDealer(Player $player)
	{
		return $this->dealerId == $player->getId();
	}

	public function getDealer()
	{
		
	}

    public function getPlayerByName($name)
    {
		foreach ($this->players as $player)
		{
			if ($player['name'] == $name)
			{
				return new MyPlayer($player);
			}
		}
	}
}
