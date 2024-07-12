<?php

namespace BrainGames\Games\Brain\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\win;
use function BrainGames\Engine\gameover;
use function BrainGames\Engine\randomOperation;
use function BrainGames\Engine\calc;

function brainCalc(): void
{
    $name = greeting();

    line('What is the result of the expression?');

    for ($i = 1; $i <= 3; $i++) {
        $operand1 = rand(0, 100);
        $operand2 = rand(0, 100);
        $operation = randomOperation('+-*');

        line('Question: %s %s %s', $operand1, $operation, $operand2);

        $answer = prompt('Your answer');
        $correctAnswer = calc($operand1, $operand2, $operation);

        if ($correctAnswer !== $answer) {
            gameover($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    win($name);
}
