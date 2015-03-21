<?php

include('player.php');

$gameStateJson = file_get_contents('sample.json');

$player = new Player();

var_dump($player->betRequest(json_decode($gameStateJson, true)));

