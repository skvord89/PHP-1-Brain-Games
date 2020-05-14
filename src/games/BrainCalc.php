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
        $operator = $operators[array_rand($operators)];
        $number1 = rand(1, 99);
        $number2 = rand(1, 99);
    
        switch ($operator) {
            case '+':
                $correctAnswer = $number1 + $number2;
                break;
            case '-':
                $correctAnswer = $number1 - $number2;
                break;
            case '*':
                $correctAnswer = $number1 * $number2;
                break;
        }
    
        $question = "{$number1} {$operator} {$number2}";
        $gameSet[] = [$question, (string) $correctAnswer];
    }
    return $gameSet;
}
