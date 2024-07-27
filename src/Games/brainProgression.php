<?php

namespace BrainGames\Games\Brain\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\gameOver;

function startBrainProgression(): void
{
    $name = greeting();

    line('What number is missing in the progression?');

    for ($i = 1; $i <= 3; $i++) {
        $data = randomProgression();

        $progression = $data['progression'];
        $correctAnswer = $data['correctAnswer'];

        line('Question: %s', $progression);

        $answer = prompt('Your answer');

        if ($correctAnswer !== $answer) {
            gameOver($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
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
