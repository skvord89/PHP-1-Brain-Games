<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS;

function brainprime()
{
    $gameData = generateGameData();
    $greeting = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    gameFlow($greeting, $gameData);
}

function generateGameData()
{
    $gameData = [];
    for ($round = 0; $round < MAX_ROUNDS; $round += 1) {
        $number = rand(1, 99);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $gameData[] = [$number, $correctAnswer];
    }
    return $gameData;
}

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($num); $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
