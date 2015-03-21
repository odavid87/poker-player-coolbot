<?php

class Game
{
	private $dealerId;
	private $players;
	private $currentBuyIn;
	private $minimumRaise;
	private $inAction;

	function __construct($gameState)
	{
		$this->dealerId = $gameState['dealer'];
		$this->players = $gameState['players'];
		$this->currentBuyIn = $gameState['current_buy_in'];
		$this->minimumRaise = $gameState['minimum_raise'];
		$this->inAction = $gameState['in_action'];
		
		$communityCards = isset($gameState['community_cards']) ? $gameState['community_cards'] : array();
		$this->handState = new HandState($communityCards);
	}

	public function isDealer(MyPlayer $player)
	{
		return $this->dealerId == $player->getId();
	}
	
	public function getHandState()
	{
		return $this->handState;
	}

    public function getActivePlayer()
    {
		foreach ($this->players as $player)
		{
			if ($this->inAction == $player['id'])
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
