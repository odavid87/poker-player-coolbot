<?php
class PostFlopStrategy extends AbstractBetStrategy
{
    public function betRequest(Game $game)
    {
        $myself = $game->getActivePlayer();
        $allCards = array_merge($myself->getMyHand()->getCards(), $game->getCommunityCards());

        $allCardsWinnerValidator = $this->getWinnerValidator($this->getValidators($allCards));
        $withoutMyCardsWinnerValidator = $this->getWinnerValidator($this->getValidators($myself->getMyHand()->getCards()));


        if ($this->myCardsAreUsedToMakeHand($allCardsWinnerValidator, $withoutMyCardsWinnerValidator)){
            if ($allCardsWinnerValidator instanceof TwoPairValueValidator) {
                return $this->betAmount($game->call());
            }
            return $this->betAmount($game->minimalBid());
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

    /**
     * @param $validators
     */
    protected function getWinnerValidator($validators)
    {
        foreach ($validators as $validator) {
            if ($validator->isValid()) {
                $winnerValidator = $validator;
                return $winnerValidator;
            }
        }
    }

    private function myCardsAreUsedToMakeHand($allCardsWinnerValidator, $withoutMyCardsWinnerValidator)
    {
        return get_class($allCardsWinnerValidator) != get_class($withoutMyCardsWinnerValidator);
    }
}
