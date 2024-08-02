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

function preparationGame(string $rules, int $roundCount, array $data): void
{
    $name = greeting();
    line($rules);

    for ($i = 0; $i <= $roundCount - 1; $i++) {
        $question = $data['questions'][$i];
        $correctAnswers = $data['correctAnswers'][$i];

        questionAsk($question, $correctAnswers, $name);
    }

    line('Congratulations, %s!', $name);
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
