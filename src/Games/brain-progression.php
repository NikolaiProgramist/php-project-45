<?php

namespace BrainGames\Games\Brain\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\win;
use function BrainGames\Engine\gameover;
use function BrainGames\Engine\randomProgression;

function progression(): void
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
            gameover($answer, $correctAnswer, $name);
        }

        line('Correct!');
    }

    win($name);
}