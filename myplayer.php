<?php

class MyPlayer
{
    private $status;
    private $id;
    private $stack;
    private $bet;

    function __construct($player)
    {   
    	$this->status = $player['status'];
    	$this->id = $player['id'];
    	$this->stack = $player['stack'];
    	$this->bet = $player['bet'];
    	if (!empty($player['hole_cards']))
    	{
    	    $this->hand = new MyHand($player['hole_cards']);
    	}
    }
    
    public function getMyHand()
    {
        return $this->hand;
    }

    public function getId()
    {
		return $this->id;
    }   
}
