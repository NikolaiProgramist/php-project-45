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

        if (isPrime($num)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

        $gameData['questions'][] = "Question: {$num}";
        $gameData['correctAnswers'][] = $correctAnswer;
    }

    startGame(RULES, ROUND_COUNT, $gameData);
}

function isPrime(int $num): bool
{
    if ($num === 0 || $num === 1) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
