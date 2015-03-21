<?php
class PostFlopStrategy extends AbstractBetStrategy
{
    public function betRequest(Game $game)
    {
        $myself = $game->getActivePlayer();
        $allCards = array_merge($myself->getMyHand()->getCards(), $game->getCommunityCards());

        $validators = $this->getValidators($allCards);
        foreach ($validators as $validator) {
            if ($validator->isValid()) {
                if ($validator instanceof OnePairValueValidator) {
                    return $this->betAmount($game->call());
                }
                return $this->betAmount($game->minimalBid());
            }
        }
        return 0;
    }

    private function getValidators(array $cards)
    {
        return array(
            new StraightFlushValueValidator($cards),
            new FourOfAKindValueValidator($cards),
            new FullHouseValueValidator($cards),
            new FlushValueValidator($cards),
            new StraightValueValidator($cards),
            new DrillValueValidator($cards),
            new TwoPairValueValidator($cards),
            new OnePairValueValidator($cards),
        );
    }
}