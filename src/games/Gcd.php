<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS_COUNT;

function braingcd()
{
    $gameData = generateGameData();
    $greeting = "Find the greatest common divisor of given numbers.";
    gameFlow($greeting, $gameData);
}

function generateGameData()
{
    $gameData = [];
    for ($round = 0; $round < MAX_ROUNDS_COUNT; $round += 1) {
        $number1 = rand(1, 99);
        $number2 = rand(1, 99);
        $correctAnswer = findGcd($number1, $number2);
        $question = "{$number1} {$number2}";
        $gameData[] = [$question, (string) $correctAnswer];
    }
    return $gameData;
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
