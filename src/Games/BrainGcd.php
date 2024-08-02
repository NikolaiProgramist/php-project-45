<?php

namespace BrainGames\Games\Brain\Gcd;

use function BrainGames\Engine\preparationGame;

const RULES = 'Find the greatest common divisor of given numbers.';
const ROUND_COUNT = 3;

function startBrainGcd(): void
{
    $data = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $data['questions'][] = "Question: {$num1} {$num2}";
        $data['correctAnswers'][] = gcd($num1, $num2);
    }

    preparationGame(RULES, ROUND_COUNT, $data);
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
