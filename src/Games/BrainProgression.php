<?php

namespace BrainGames\Games\Brain\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUND_COUNT;

const RULES = 'What number is missing in the progression?';

function startBrainProgression(): void
{
    $gameData = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $dataProgression = randomProgression();

        $gameData['questions'][] = "Question: {$dataProgression['progression']}";
        $gameData['correctAnswers'][] = $dataProgression['correctAnswer'];
    }

    startGame(RULES, ROUND_COUNT, $gameData);
}

function randomProgression(): array
{
    $progression = [];

    $progressionLength = random_int(5, 10);
    $progressionChange = random_int(1, 10);
    $progressionNumber = $progressionChange;

    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $progressionNumber;
        $progressionNumber += $progressionChange;
    }

    $randomNumber = random_int(0, $progressionLength - 1);
    $correctAnswer = (string) $progression[$randomNumber];
    $progression[$randomNumber] = '..';

    return ['progression' => implode(' ', $progression), 'correctAnswer' => $correctAnswer];
}
