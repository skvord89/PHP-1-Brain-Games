<?php

namespace BrainGames\GameFlow;

use function cli\line;
use function cli\prompt;

function gameFlow($roundSet)
{
    line('Welcome to  the Brain Games!');
    line("");
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}\n");

    for ($gameRound = 0; $gameRound < 3; $gameRound += 1) {
        [$question, $correctAnswer] = $roundSet[$gameRound];
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ((string) $correctAnswer === $userAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
}
