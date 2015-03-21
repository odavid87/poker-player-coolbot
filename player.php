<?php

include('game.php');
include('myplayer.php');
include('myhand.php');
include('card.php');
include('handstate.php');

class Player
{
    const VERSION = "Default PHP folding player";
    private $myName;
    
	function __construct($myName)
	{
	    $this->myName = $myName;
	}

    public function betRequest(Game $game)
    {
        $myself = $game->getPlayerByName($this->myName);
        if ($game->isDealer($myself)) {
            return $this->betAmount($game->minimalBid());
        } else if ($myself->getMyHand()->hasPotential()) {
            return $this->betAmount($game->minimalBid());
        } else {
            return 0;
        }

    }

    public function showdown($game_state)
    {
    }

    private function betAmount($amount)
    {
        return (int) $amount;
    }
}
