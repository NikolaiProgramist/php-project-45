<?php

namespace BrainGames\Games\Brain\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUND_COUNT;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startBrainPrime(): void
{
    $gameData = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num = random_int(0, 100);

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
