<?php
class OnePairValueValidator extends AbstractValueValidator
{
    public function isValid()
    {
        foreach ($this->ranks as $rank => $rankCount) {
            if ($rankCount == 2) {
				$card = new Card($rank, 'spades');
				if ($card->isFigure()) return true;
			}
        }

		return false;
    }
}
