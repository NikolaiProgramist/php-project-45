<?php

namespace BrainGames\Games\Brain\Progression;

use function BrainGames\Engine\startGame;

const RULES = 'What number is missing in the progression?';
const ROUND_COUNT = 3;

function startBrainProgression(): void
{
    $data = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $dataProgression = randomProgression();

        $data['questions'][] = "Question: {$dataProgression['progression']}";
        $data['correctAnswers'][] = $dataProgression['correctAnswer'];
    }

    startGame(RULES, ROUND_COUNT, $data);
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
