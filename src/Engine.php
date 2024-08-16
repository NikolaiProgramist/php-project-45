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

function startGame(string $rules, int $roundCount, array $data): void
{
    $name = greeting();
    line($rules);

    for ($i = 0; $i < $roundCount; $i++) {
        $question = $data['questions'][$i];
        $correctAnswer = $data['correctAnswers'][$i];

        $answer = questionAsk($question);

        if (isCorrectAnswer($answer, $correctAnswer)) {
            line('Correct!');
        } else {
            gameOver($answer, $correctAnswer, $name);
        }
    }

    line('Congratulations, %s!', $name);
}

function questionAsk(string $question): string
{
    line($question);
    return prompt('Your answer');
}

function isCorrectAnswer(string $answer, string $correctAnswer): bool
{
    if ($correctAnswer === $answer) {
        return true;
    } else {
        return false;
    }
}
