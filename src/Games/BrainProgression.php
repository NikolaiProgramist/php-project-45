<?php

namespace BrainGames\Games\Brain\Progression;

use function cli\line;
use function BrainGames\Engine\questionAsk;
use function BrainGames\Engine\preparationGame;

const RULES = 'What number is missing in the progression?';
const ROUND_COUNT = 3;

function startBrainProgression(): void
{
    $name = preparationGame(RULES);

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
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
