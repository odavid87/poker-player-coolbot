<?php

include('player.php');

$gameStateJson = file_get_contents('sample.json');

$player = new Player('Bob');

$game = Game::createFromJson($gameStateJson);

$player->betRequest($game);

