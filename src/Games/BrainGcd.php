<?php

namespace BrainGames\Games\Brain\Gcd;

use function cli\line;
use function BrainGames\Engine\questionAsk;
use function BrainGames\Engine\preparationGame;

const RULES = 'Find the greatest common divisor of given numbers.';
const ROUND_COUNT = 3;

function startBrainGcd(): void
{
    $name = preparationGame(RULES);

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $question = "Question: {$num1} {$num2}";
        $correctAnswer = gcd($num1, $num2);

        questionAsk($question, $correctAnswer, $name);
    }

    line('Congratulations, %s!', $name);
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
