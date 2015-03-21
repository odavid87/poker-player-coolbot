<?php

require_once('player.php');

$player = new Player('coolbot');


switch($_POST['action'])
{
    case 'bet_request':
        $game = Game::createFromJson($_POST['game_state']);
        echo $player->betRequest($game);
        break;
    case 'showdown':
        $game = Game::createFromJson($_POST['game_state']);
        $player->showdown($game);
        break;
    case 'version':
        echo Player::VERSION;
}
