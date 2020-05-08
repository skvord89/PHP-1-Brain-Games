<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\GameFlow\gameFlow;

function braineven()
{
    $gameSet = generateGameSet();
    gameFlow($gameSet);
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < 3; $round += 1) {
        $questionNumber = rand(1, 99);
        $correctAnswer = ($questionNumber % 2 === 0) ? 'yes' : 'no';
        $gameSet[] = [$questionNumber, $correctAnswer];
    }
    return $gameSet;
}
