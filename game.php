<?php

class Game
{
	private $dealerId;
	private $players;
	private $currentBuyIn;
	private $minimumRaise;

	function __construct($gameState)
	{
		$this->dealerId = $gameState['dealer'];
		$this->players = $gameState['players'];
		$this->currentBuyIn = $gameState['current_buy_in'];
		$this->minimumRaise = $gameState['minimum_raise'];
	}

	public function isDealer(Player $player)
	{
		return $this->dealerId == $player->getId();
	}

	public function getDealer()
	{
		return $this->getPlayerById($this->dealerId);
	}

	public function getPlayerById($id)
	{
		foreach ($this->players as $player)
		{
			if ($player['id'] == $id)
			{
				return new MyPlayer($player);
			}
		}
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
	
	public static function createFromJson($gameState)
	{
		return new Game(json_decode($gameState, true));
	}
	
	public function minimalBid()
	{
		return $this->currentBuyIn + $this->minimumRaise;
	}
}
