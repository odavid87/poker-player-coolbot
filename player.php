<?php

include('game.php');
include('myplayer.php');
include('myhand.php');
include('card.php');
include('handstate.php');
include('abstractbetstrategy.php');
include('preflopstrategy.php');
include('postflopstrategy.php');
include('valuevalidator/abstract.php');

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
        $strategy = $this->getStrategy();
        $betAmount = $strategy->betRequest($game);
        return $betAmount;
    }

    public function showdown($game_state)
    {
    }

    private function getStrategy()
    {
        return new PreFlopStrategy();
    }
}
