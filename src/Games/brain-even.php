<?php

namespace BrainGames\Games\Brain\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\win;
use function BrainGames\Engine\gameover;
use function BrainGames\Engine\isEven;

function brainEven(): void
{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= 3; $i++) {
        $num = rand(0, 20);
        line('Question: %s', $num);
        $answer = prompt('Your answer');
        $correctAnswer = isEven($num);

        if ($answer !== 'yes' && $answer !== 'no') {
            gameover($answer, $correctAnswer, $name);
        }

        if ($correctAnswer !== $answer) {
            gameover($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    win($name);
}
