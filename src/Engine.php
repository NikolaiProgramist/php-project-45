<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

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

function preparationGame(string $rules): string
{
    $name = greeting();
    line($rules);

    return $name;
}

function questionAsk(string $question, string $correctAnswer, string $name): void
{
    line($question);

    $answer = prompt('Your answer');
    isCorrectAnswer($answer, $correctAnswer, $name);
}

function isCorrectAnswer(string $answer, string $correctAnswer, string $name): void
{
    if ($correctAnswer !== $answer) {
        gameOver($answer, $correctAnswer, $name);
    }

    line('Correct!');
}
