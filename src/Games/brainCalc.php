<?php

namespace BrainGames\Games\Brain\Calc;

use function cli\line;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\questionAsk;

function startBrainCalc(): void
{
    $name = greeting();

    line('What is the result of the expression?');

    for ($i = 1; $i <= 3; $i++) {
        $operand1 = rand(0, 100);
        $operand2 = rand(0, 100);
        $operation = randomOperation('+-*');

        $question = "Question: {$operand1} {$operation} {$operand2}";
        $correctAnswer = calc($operand1, $operand2, $operation);

        questionAsk($question, $correctAnswer, $name);
    }

    line('Congratulations, %s!', $name);
}

function randomOperation(string $operations): string
{
    $randomOperation = str_shuffle($operations);
    return $randomOperation[0];
}

function calc(int $operand1, int $operand2, string $operation): string
{
    return match ($operation) {
        '+' => (string) ($operand1 + $operand2),
        '-' => (string) ($operand1 - $operand2),
        '*' => (string) ($operand1 * $operand2),
        default => ''
    };
}
