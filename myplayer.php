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
    }   

    public function getId()
    {
		return $this->id;
    }   
}
