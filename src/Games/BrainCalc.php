<?php

namespace BrainGames\Games\Brain\Calc;

use function cli\line;
use function BrainGames\Engine\preparationGame;

const RULES = 'What is the result of the expression?';
const ROUND_COUNT = 3;

function startBrainCalc(): void
{
    $data = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $operand1 = rand(0, 100);
        $operand2 = rand(0, 100);
        $operation = randomOperation();

        $data['questions'][] = "Question: {$operand1} {$operation} {$operand2}";
        $data['correctAnswers'][] = calc($operand1, $operand2, $operation);
    }

    preparationGame(RULES, ROUND_COUNT, $data);
}

function randomOperation(): string
{
    $operations = ['+', '-', '*'];

    return $operations[array_rand($operations)];
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
