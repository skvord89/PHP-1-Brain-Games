<?php

namespace BrainGames\GameFlow;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS_COUNT = 3;

function gameFlow($greeting, $gameData)
{
    line('Welcome to  the Brain Games!');
    line("{$greeting}");
    line("");
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}\n");

    for ($gameRound = 0; $gameRound < MAX_ROUNDS_COUNT; $gameRound += 1) {
        [$question, $correctAnswer] = $gameData[$gameRound];
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ($correctAnswer === $userAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
}
