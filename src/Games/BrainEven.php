<?php

namespace BrainGames\Games\Brain\Even;

use function BrainGames\Engine\preparationGame;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';
const ROUND_COUNT = 3;

function startBrainEven(): void
{
    $data = [];

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num = rand(0, 20);

        $data['questions'][] = "Question: $num";
        $data['correctAnswers'][] = isEven($num);
    }

    preparationGame(RULES, ROUND_COUNT, $data);
}

function isEven(int $num): string
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}
