<?php

include('game.php');
include('myplayer.php');

class Player
{
    const VERSION = "Default PHP folding player";
    private $myName;
    
	function __construct($myName)
	{
	    $this->myName = $myName;
	}

    public function betRequest($game)
    {
		var_dump($game->getPlayerByName($this->myName));

        return $this->betAmount($game->minimalBid());
    }

    public function showdown($game_state)
    {
    }

    private function betAmount($amount)
    {
        return (int) $amount;
    }
}
