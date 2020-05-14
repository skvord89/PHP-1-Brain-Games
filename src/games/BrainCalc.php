<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\GameFlow\gameFlow;

function braincalc()
{
    $gameSet = generateGameSet();
    $greeting = "What is the result of the expression?";
    gameFlow($greeting, $gameSet);
}

function generateGameSet()
{
    $gameSet = [];
    $operators = ['+', '-', '*'];
    for ($round = 0; $round < 3; $round += 1) {
        $questionOperator = $operators[array_rand($operators)];
        $questionNumber1 = rand(1, 99);
        $questionNumber2 = rand(1, 99);
    
        switch ($questionOperator) {
            case '+':
                $correctAnswer = $questionNumber1 + $questionNumber2;
                break;
            case '-':
                $correctAnswer = $questionNumber1 - $questionNumber2;
                break;
            case '*':
                $correctAnswer = $questionNumber1 * $questionNumber2;
                break;
        }

    
        $question = "{$questionNumber1} {$questionOperator} {$questionNumber2}";
        $gameSet[] = [$question, $correctAnswer];
    }
    return $gameSet;
}
