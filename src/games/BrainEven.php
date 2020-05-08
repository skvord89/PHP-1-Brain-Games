<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;

function braineven()
{
    line('Welcome to  the Brain Games!');
    line("");
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}\n");

    $winnedRounds = 0;

    for ($gameRound = 0; $gameRound < 3; $gameRound += 1) {
        $questionNumber = rand(1, 99);
        $correctAnswer = ($questionNumber % 2 === 0) ? 'yes' : 'no';

        line("Question: {$questionNumber}");
        $userAnswer = prompt("Your answer");
        if ($correctAnswer === $userAnswer) {
            line('Correct!');
            $winnedRounds += 1;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        }
    }
    if ($winnedRounds === 3) {
        line("Congratulations, {$userName}!");
    }
}
