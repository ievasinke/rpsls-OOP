<?php

class Element
{
    private string $name;
    private array $winningPairs;

    public function __construct(string $name, array $winningPairs)
    {
        $this->name = $name;
        $this->winningPairs = $winningPairs;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWinner(Element $opponent): bool
    {
        return in_array($opponent->getName(), $this->winningPairs);
    }
}
