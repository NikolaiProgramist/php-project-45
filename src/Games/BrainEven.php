<?php

namespace BrainGames\Games\Brain\Even;

use function cli\line;
use function BrainGames\Engine\questionAsk;
use function BrainGames\Engine\preparationGame;

function startBrainEven(): void
{
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    $name = preparationGame($rules);

    for ($i = 1; $i <= 3; $i++) {
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
