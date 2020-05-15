<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS;

function braingcd()
{
    $gameSet = generateGameSet();
    $greeting = "Find the greatest common divisor of given numbers.";
    gameFlow($greeting, $gameSet);
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < MAX_ROUNDS; $round += 1) {
        $questionNumber1 = rand(1, 99);
        $questionNumber2 = rand(1, 99);
        $correctAnswer = findGcd($questionNumber1, $questionNumber2);
        $question = "{$questionNumber1} {$questionNumber2}";
        $gameSet[] = [$question, (string) $correctAnswer];
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
