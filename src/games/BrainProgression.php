<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\GameFlow\gameFlow;

use const BrainGames\GameFlow\MAX_ROUNDS;

function brainprogression()
{
    $gameSet = generateGameSet();
    $greeting = "What number is missing in the progression?";
    gameFlow($greeting, $gameSet);
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < MAX_ROUNDS; $round += 1) {
        $progressionStep = rand(1, 20);
        $progressionBase = rand(-50, 50);
        $progressionLength = 10;
        $progression = generateProgression($progressionBase, $progressionStep, $progressionLength);
        $questionIndex = array_rand($progression);
        $correctAnswer = $progression[$questionIndex];
        $question = generateQuestion($progression, $questionIndex);

        $gameSet[] = [$question, (string) $correctAnswer];
    }
    return $gameSet;
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
