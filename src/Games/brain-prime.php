<?php

namespace BrainGames\Games\Brain\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\gameOver;

function startBrainPrime(): void
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

    line('Congratulations, %s!', $name);
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

