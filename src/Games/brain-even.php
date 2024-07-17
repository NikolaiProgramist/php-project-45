<?php

namespace BrainGames\Games\Brain\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\winning;
use function BrainGames\Engine\gameOver;

function startBrainEven(string $name): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= 3; $i++) {
        $num = rand(0, 20);
        line('Question: %s', $num);
        $answer = prompt('Your answer');
        $correctAnswer = isEven($num);

        if ($answer !== 'yes' && $answer !== 'no') {
            gameOver($answer, $correctAnswer, $name);
        }

        if ($correctAnswer !== $answer) {
            gameOver($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    winning($name);
}

function isEven(int $num): string
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}
