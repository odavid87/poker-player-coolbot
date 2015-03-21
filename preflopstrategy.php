<?php
class PreFlopStrategy extends AbstractBetStrategy
{
    public function betRequest(Game $game)
    {
        $myself = $game->getActivePlayer();
        $myHand = $myself->getMyHand();
        if ($game->getNumberOfActivePlayers() > 3) {
            if ($myHand->hasHighPair()) {
                return $this->betAmount($game->call());
            }
            return 0;
        }

        if ($myHand->hasPotential()) {
            return $this->betAmount($game->minimalBid());
        } else {
            return 0;
        }
    }
}
