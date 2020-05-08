<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\GameFlow\gameFlow;

function brainprime()
{
    $gameSet = generateGameSet();
    $greeting = generateGreeting();
    gameFlow($greeting, $gameSet);
}

function generateGreeting()
{
    return "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < 3; $round += 1) {
        $questionNumber = rand(1, 99);
        $correctAnswer = isPrime($questionNumber) ? 'yes' : 'no';
        $gameSet[] = [$questionNumber, $correctAnswer];
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
