<?php
class PreFlopStrategy extends AbstractStrategy
{
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
}