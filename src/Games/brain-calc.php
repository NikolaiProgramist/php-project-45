<?php

namespace BrainGames\Games\Brain\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\gameOver;
use function BrainGames\Engine\randomOperation;

function startBrainCalc(): void
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
            gameOver($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}

function calc(int $operand1, int $operand2, string $operation): string
{
    switch ($operation) {
        case '+':
            return (string) ($operand1 + $operand2);
        case '-':
            return (string) ($operand1 - $operand2);
        case '*':
            return (string) ($operand1 * $operand2);
    }
}
