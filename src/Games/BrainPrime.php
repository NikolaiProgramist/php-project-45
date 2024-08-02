<?php

namespace BrainGames\Games\Brain\Prime;

use function cli\line;
use function BrainGames\Engine\questionAsk;
use function BrainGames\Engine\preparationGame;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const ROUND_COUNT = 3;

function startBrainPrime(): void
{
    $name = preparationGame(RULES);

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $num = rand(0, 100);

        $question = "Question: {$num}";
        $correctAnswer = isPrime($num);

        questionAsk($question, $correctAnswer, $name);
    }

    line('Congratulations, %s!', $name);
}

function isPrime(int $num): string
{
    if ($num === 0 || $num === 1) {
        return 'no';
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}
