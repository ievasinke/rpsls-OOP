<?php

require_once 'Elements.php';

class Game
{
    private array $elements = [];
    private Element $playerChoice;
    private Element $opponentChoice;

    public function __construct()
    {
        $this->elements = [
            new Element('rock', ['scissors', 'lizard']),
            new Element('paper', ['rock', 'spock']),
            new Element('scissors', ['paper', 'lizard']),
            new Element('lizard', ['spock', 'paper']),
            new Element('spock', ['rock', 'scissors'])
        ];
    }

    public function getElementByName(string $name): ?Element
    {
        foreach ($this->elements as $element) {
            if ($element->getName() === $name) {
                return $element;
            }
        }
        return null;
    }

    public function play(string $playerChoiceName): void
    {
        $this->playerChoice = $this->getElementByName($playerChoiceName);
        $this->opponentChoice = $this->elements[array_rand($this->elements)];

        echo "You chose: {$this->playerChoice->getName()}\n";
        echo "Opponent chose: {$this->opponentChoice->getName()}\n";

        $this->evaluateResult();
    }

    private function evaluateResult(): void
    {
        if ($this->playerChoice->getName() === $this->opponentChoice->getName()) {
            echo "It's a tie! You both chose {$this->playerChoice->getName()}.\n";
        } elseif ($this->playerChoice->getWinner($this->opponentChoice)) {
            $element = ucfirst($this->playerChoice->getName());
            echo "You win! $element beats {$this->opponentChoice->getName()}.\n";
        } else {
            $element = ucfirst($this->opponentChoice->getName());
            echo "You lose! $element beats {$this->playerChoice->getName()}.\n";
        }
    }
}
