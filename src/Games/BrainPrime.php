<?php

namespace BrainGames\Games\Brain\Prime;

use function BrainGames\Engine\startGame;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const ROUND_COUNT = 3;

function startBrainPrime(): void
{
    $gameData = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num = rand(0, 100);

        $gameData['questions'][] = "Question: {$num}";
        $gameData['correctAnswers'][] = isPrime($num);
    }

    startGame(RULES, ROUND_COUNT, $gameData);
}

function isPrime(int $num): string
{
    if ($num === 0 || $num === 1) {
        return 'no';
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}
