<?php

namespace BrainGames\Games\Brain\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\win;
use function BrainGames\Engine\gameOver;
use function BrainGames\Engine\isPrime;

function brainPrime(): void
{
    $name = greeting();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 1; $i <= 3; $i++) {
        $num = rand(0, 100);

        line('Question: %s', $num);

        $answer = prompt('Your answer');
        $correctAnswer = isPrime($num);

        if ($correctAnswer !== $answer) {
            gameOver($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    win($name);
}
