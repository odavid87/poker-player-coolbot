<?php

include('drill.php');
include('flush.php');
include('fourofakind.php');
include('fullhouse.php');
include('onepair.php');
include('twopair.php');
include('straight.php');
include('straightflush.php');

abstract class AbstractValueValidator
{
    protected $ranks;
    protected $suits;
	protected $cards;

	function __construct($cards)
	{
		$this->cards = $cards;
		$this->fillRanks($cards);
		$this->fillSuits($cards);
	}

    abstract public function isValid();

    protected function getNumberOfPairs()
    {
        $numberOfPairs = 0;
        foreach ($this->ranks as $rankValue) {
            if ($rankValue == 2) $numberOfPairs++;
        }
        return $numberOfPairs;
    }

    /**
     * @param array $cards
     */
    protected function fillRanks(array $cards)
    {
        foreach ($cards as $card) {
            if (!isset($this->ranks[$card->getRank()])) {
            	$this->ranks[$card->getRank()] = 0;
			}
            $this->ranks[$card->getRank()]++;
        }
    }

    protected function fillSuits(array $cards)
    {
        foreach ($cards as $card) {
            $this->suits[$card->getSuit()][] = $card;
        }
    }
}
