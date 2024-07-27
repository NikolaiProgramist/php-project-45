<?php

namespace BrainGames\Engine;

use JetBrains\PhpStorm\NoReturn;
use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}

#[NoReturn] function gameOver(string $answer, string $correctAnswer, string $name): void
{
    line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
    line('Let\'s try again, %s!', $name);
    exit;
}

function questionAsk(string $question, string $correctAnswer): void
{
    line($question);

    $answer = prompt('Your answer');
    isCorrectAnswer($answer, $correctAnswer);
}

function isCorrectAnswer(string $correctAnswer, string $name): void
{
    $answer = prompt('Your answer');

    if ($correctAnswer !== $answer) {
        gameOver($answer, $correctAnswer, $name);
    }

    line('Correct!');
}
