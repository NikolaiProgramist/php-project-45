<?php

namespace BrainGames\Games\Brain\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUND_COUNT;

const RULES = 'Find the greatest common divisor of given numbers.';

function startBrainGcd(): void
{
    $gameData = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);

        $gameData['questions'][] = "Question: {$num1} {$num2}";
        $gameData['correctAnswers'][] = gcd($num1, $num2);
    }

    startGame(RULES, ROUND_COUNT, $gameData);
}

function gcd(int $num1, int $num2): string
{
    $maxNum = max($num1, $num2);
    $minNum = min($num1, $num2);

    for ($i = $minNum; $i > 0; $i--) {
        if ($maxNum % $i === 0 && $minNum % $i === 0) {
            return (string) $i;
        }
    }

    return '0';
}
