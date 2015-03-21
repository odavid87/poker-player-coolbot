<?php
class PostFlopStrategy extends AbstractBetStrategy
{
    public function betRequest(Game $game)
    {
        $myself = $game->getActivePlayer();
        $allCards = array_merge($myself->getMyHand()->getCards(), $game->getCommunityCards());



        if ($game->isDealer($myself)) {
            return $this->betAmount($game->minimalBid());
        } else if ($myself->getMyHand()->hasPotential()) {
            return $this->betAmount($game->minimalBid());
        } else {
            return 0;
        }
    }
}