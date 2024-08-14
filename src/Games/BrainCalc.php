<?php

namespace BrainGames\Games\Brain\Calc;

use function BrainGames\Engine\startGame;

const RULES = 'What is the result of the expression?';
const ROUND_COUNT = 3;

function startBrainCalc(): void
{
    $gameData = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $operand1 = random_int(0, 100);
        $operand2 = random_int(0, 100);
        $operation = randomOperation();

        $gameData['questions'][] = "Question: {$operand1} {$operation} {$operand2}";
        $gameData['correctAnswers'][] = calc($operand1, $operand2, $operation);
    }

    startGame(RULES, ROUND_COUNT, $gameData);
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
