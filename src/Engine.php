<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May i have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function win(string $name): void
{
    line('Congratulations, %s!', $name);
}

function gameover(string $answer, string $correctAnswer, string $name): void
{
    line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
    line('Let\'s try again, %s!', $name);
    exit;
}

function isEven(int $num): string
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function randomOperation(string $operations): string
{
    $randomOperation = str_shuffle($operations);
    return $randomOperation[0];
}

function calc(int $operand1, int $operand2, string $operation): string
{
    switch ($operation) {
        case '+':
            return (string) ($operand1 + $operand2);
        case '-':
            return (string)($operand1 - $operand2);
        case '*':
            return (string) ($operand1 * $operand2);
    }
}