<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;

function braincalc()
{
    line('Welcome to  the Brain Games!');
    line("");
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}\n");

    $winnedRounds = 0;
    $operators = ['+', '-', '*'];

    for ($gameRound = 0; $gameRound < 3; $gameRound += 1) {
        $questionOperator = $operators[array_rand($operators)];
        $questionNumber1 = rand(1, 99);
        $questionNumber2 = rand(1, 99);

        if ($questionOperator === '+') {
            $correctAnswer = $questionNumber1 + $questionNumber2;
        } elseif ($questionOperator === '-') {
            $correctAnswer = $questionNumber1 - $questionNumber2;
        } else {
            $correctAnswer = $questionNumber1 * $questionNumber2;
        }

        line("Question: {$questionNumber1} {$questionOperator} {$questionNumber2}");
        $userAnswer = prompt("Your answer");
        if ($correctAnswer === (int) $userAnswer) {
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
