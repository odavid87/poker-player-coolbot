<?php
class PostFlopStrategy extends AbstractBetStrategy
{
    public function betRequest(Game $game)
    {
        $myself = $game->getActivePlayer();
        $allCards = array_merge($myself->getMyHand()->getCards(), $game->getCommunityCards());

        $allCardsFormatted = array_map(function(Card $card){
            return $card->getRank() . strtoupper(substr($card->getSuit(), 0, 1));
        }, $allCards);
        

        if ($game->isDealer($myself)) {
            return $this->betAmount($game->minimalBid());
        } else if ($myself->getMyHand()->hasPotential()) {
            return $this->betAmount($game->minimalBid());
        } else {
            return 0;
        }
    }
}