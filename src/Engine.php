<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame(string $gameName): void
{
    $name = greeting();
    $game = "BrainGames\\Games\\Brain\\{$gameName}\\startBrain{$gameName}";

    if (function_exists($game)) {
        $game($name);
    }
}

function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function gameOver(string $answer, string $correctAnswer, string $name): void
{
    line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
    line('Let\'s try again, %s!', $name);
    exit;
}

function randomOperation(string $operations): string
{
    $randomOperation = str_shuffle($operations);
    return $randomOperation[0];
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
