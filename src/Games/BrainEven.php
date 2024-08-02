<?php

namespace BrainGames\Games\Brain\Even;

use function cli\line;
use function BrainGames\Engine\questionAsk;
use function BrainGames\Engine\preparationGame;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';
const ROUND_COUNT = 3;

function startBrainEven(): void
{
    $name = preparationGame(RULES);

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num = rand(0, 20);

        $question = "Question: $num";
        $correctAnswer = isEven($num);

        questionAsk($question, $correctAnswer, $name);
    }

    line('Congratulations, %s!', $name);
}

function isEven(int $num): string
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}
