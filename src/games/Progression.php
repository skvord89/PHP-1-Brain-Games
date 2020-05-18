<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS_COUNT;

function brainprogression()
{
    $gameData = generateGameData();
    $greeting = "What number is missing in the progression?";
    gameFlow($greeting, $gameData);
}

function generateGameData()
{
    $gameData = [];
    for ($round = 0; $round < MAX_ROUNDS_COUNT; $round += 1) {
        $progressionStep = rand(1, 20);
        $progressionBase = rand(-50, 50);
        $progressionLength = 10;
        $progression = generateProgression($progressionBase, $progressionStep, $progressionLength);
        $questionIndex = array_rand($progression);
        $correctAnswer = $progression[$questionIndex];
        $question = generateQuestion($progression, $questionIndex);

        $gameData[] = [$question, (string) $correctAnswer];
    }
    return $gameData;
}

function generateProgression($base, $step, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i += 1) {
        $progression[] = $base + $step * $i;
    }

    return $progression;
}

function generateQuestion($progression, $questionIndex)
{
    $progression[$questionIndex] = '..';
    return implode($progression, ' ');
}
