<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Brain\Progression\progression;
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

function gcd(int $num1, int $num2): string
{
    $maxNum = max($num1, $num2);
    $minNum = min($num1, $num2);

    for ($i = $minNum; $i > 0; $i--) {
        if ($maxNum % $i === 0 && $minNum % $i === 0) {
            return (string) $i;
        }
    }
}

function randomProgression(): array
{
    $progression = [];

    $progressionLength = rand(5, 10);
    $progressionChange = rand(1, 10);
    $progressionNumber = $progressionChange;

    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $progressionNumber;
        $progressionNumber += $progressionChange;
    }

    $randomNumber = rand(0, $progressionLength - 1);
    $correctAnswer = (string) $progression[$randomNumber];
    $progression[$randomNumber] = '..';

    return ['progression' => implode(' ', $progression), 'correctAnswer' => $correctAnswer];
}
