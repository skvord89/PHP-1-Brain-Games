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
        $question = rand(1, 99);
        $correctAnswer = ($question % 2 === 0) ? 'yes' : 'no';
        $gameSet[] = [$question, $correctAnswer];
    }
    return $gameSet;
}
