<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS_COUNT;

function braineven()
{
    $gameData = generateGameData();
    $greeting = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    gameFlow($greeting, $gameData);
}

function generateGameData()
{
    $gameData = [];
    for ($round = 0; $round < MAX_ROUNDS_COUNT; $round += 1) {
        $question = rand(1, 99);
        $correctAnswer = ($question % 2 === 0) ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}
