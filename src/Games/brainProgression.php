<?php

namespace BrainGames\Games\Brain\Progression;

use function cli\line;
use function BrainGames\Engine\questionAsk;
use function BrainGames\Engine\preparationGame;

function startBrainProgression(): void
{
    $rules = 'What number is missing in the progression?';
    $name = preparationGame($rules);

    for ($i = 1; $i <= 3; $i++) {
        $data = randomProgression();

        $progression = $data['progression'];
        $question = "Question: {$progression}";
        $correctAnswer = $data['correctAnswer'];

        questionAsk($question, $correctAnswer, $name);
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
