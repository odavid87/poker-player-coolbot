<?php

include('player.php');

$straight = array(
        array(
                "rank" => "6",
                "suit" => "hearts",
        ),
        array(
                "rank" => "6",
                "suit" => "hearts",
        ),
        array(
                "rank" => "7",
                "suit" => "hearts",
        ),
        array(
                "rank" => "8",
                "suit" => "hearts",
        ),
        array(
                "rank" => "9",
                "suit" => "hearts",
        ),
);

$cards = array();
foreach ($straight as $card)
{
	$cards[] = new Card($card);
}

echo "isStraight (yes): ";
$straightValidator = new StraightValueValidator($cards);
var_dump($straightValidator->isValid());
