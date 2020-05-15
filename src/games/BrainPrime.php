<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS;

function brainprime()
{
    $gameSet = generateGameSet();
    $greeting = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    gameFlow($greeting, $gameSet);
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < MAX_ROUNDS; $round += 1) {
        $number = rand(1, 99);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $gameSet[] = [$number, $correctAnswer];
    }
    return $gameSet;
}

function isPrime($num)
{
    for ($i = 2; $i <= sqrt($num); $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
