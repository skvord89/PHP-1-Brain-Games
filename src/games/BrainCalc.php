<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\GameFlow\gameFlow;

function braincalc()
{
    $gameSet = generateGameSet();
    $greeting = generateGreeting();
    gameFlow($greeting, $gameSet);
}

function generateGreeting()
{
    return "What is the result of the expression?";
}

function generateGameSet()
{
    $gameSet = [];
    $operators = ['+', '-', '*'];
    for ($round = 0; $round < 3; $round += 1) {
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
    
        $question = "{$questionNumber1} {$questionOperator} {$questionNumber2}";
        $gameSet[] = [$question, $correctAnswer];
    }
    return $gameSet;
}
