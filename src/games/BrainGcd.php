<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\GameFlow\gameFlow;

function braingcd()
{
    $gameSet = generateGameSet();
    $greeting = generateGreeting();
    gameFlow($greeting, $gameSet);
}

function generateGreeting()
{
    return "Find the greatest common divisor of given numbers.";
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < 3; $round += 1) {
        $questionNumber1 = rand(1, 99);
        $questionNumber2 = rand(1, 99);
        $correctAnswer = findGcd($questionNumber1, $questionNumber2);
        $question = "{$questionNumber1} {$questionNumber2}";
        $gameSet[] = [$question, $correctAnswer];
    }
    return $gameSet;
}

function findGcd($num1, $num2)
{
    $a = max($num1, $num2);
    $b = $num1 + $num2 - $a;

    while ($a % $b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $b;
}
