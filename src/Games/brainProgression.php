<?php

namespace BrainGames\Games\Brain\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\gameOver;
use function BrainGames\Engine\randomProgression;

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