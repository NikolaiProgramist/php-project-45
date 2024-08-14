<?php

namespace BrainGames\Games\Brain\Even;

use function BrainGames\Engine\startGame;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';
const ROUND_COUNT = 3;

function startBrainEven(): void
{
    $data = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num = rand(0, 20);

        if (isEven($num)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

        $data['questions'][] = "Question: {$num}";
        $data['correctAnswers'][] = $correctAnswer;
    }

    startGame(RULES, ROUND_COUNT, $data);
}

function isEven(int $num): bool
{
    if ($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}
