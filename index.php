<?php

require_once 'Game.php';

$guess = strtolower((string)readline("Rock, Paper, Scissors, Lizard, or Spock? \n"));

$game = new Game();

if (!($game->getElementByName($guess) instanceof Element)) {
    echo "Invalid choice. Please enter Rock, Paper, Scissors, Lizard, or Spock.\n";
    exit;
}
$game->play($guess);
