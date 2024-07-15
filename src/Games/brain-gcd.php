<?php

namespace BrainGames\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\win;
use function BrainGames\Engine\gameover;
use function BrainGames\Engine\gcd;

function brainGcd(): void
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

    win($name);
}
