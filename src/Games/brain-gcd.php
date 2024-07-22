<?php

namespace BrainGames\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\gameOver;

function startBrainGcd(): void
{
    $name = greeting();

    line('Find the greatest common divisor of given numbers.');

    for ($i = 1; $i <= 3; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        line('Question: %s %s', $num1, $num2);

        $answer = prompt('Your answer');
        $correctAnswer = gcd($num1, $num2);

        if ($correctAnswer !== $answer) {
            gameOver($answer, $correctAnswer, $name);
        }

        line('Correct!');
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
