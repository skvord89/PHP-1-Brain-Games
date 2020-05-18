<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS_COUNT;

function braincalc()
{
    $gameData = generateGameData();
    $greeting = "What is the result of the expression?";
    gameFlow($greeting, $gameData);
}

function generateGameData()
{
    $gameData = [];
    $operators = ['+', '-', '*'];
    for ($round = 0; $round < MAX_ROUNDS_COUNT; $round += 1) {
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
        $gameData[] = [$question, (string) $correctAnswer];
    }
    return $gameData;
}
