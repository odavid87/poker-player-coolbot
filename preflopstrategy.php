<?php
class PreFlopStrategy extends AbstractBetStrategy
{
    public function betRequest(Game $game)
    {
        $myself = $game->getActivePlayer();
        if ($game->isDealer($myself)) {
            return $this->betAmount($game->minimalBid());
        } else if ($myself->getMyHand()->hasPotential()) {
            return $this->betAmount($game->minimalBid());
        } else {
            return 0;
        }
    }
}