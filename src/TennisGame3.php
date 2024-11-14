<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame3 implements TennisGame
{
    private int $player2Points = 0;

    private int $player1Points = 0;

    private array $pointsNames = ['Love', 'Fifteen', 'Thirty', 'Forty'];

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {
    }

    public function getScore(): string
    {
        $isEndgame = ! ($this->player1Points < 4 && $this->player2Points < 4 && ! ($this->player1Points + $this->player2Points === 6));
        if (! $isEndgame) {
            $score = $this->pointsNames[$this->player1Points];

            return $this->player1Points === $this->player2Points ? "{$score}-All" : "{$score}-{$this->pointsNames[$this->player2Points]}";
        }
        if ($this->player1Points === $this->player2Points) {
            return 'Deuce';
        }
        $leader = $this->player1Points > $this->player2Points ? $this->player1Name : $this->player2Name;
        $isAdvantage = ($this->player1Points - $this->player2Points) * ($this->player1Points - $this->player2Points) === 1;

        return $isAdvantage ? "Advantage {$leader}" : "Win for {$leader}";
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->player1Points++;
        } else {
            $this->player2Points++;
        }
    }
}
