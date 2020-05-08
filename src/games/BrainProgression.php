<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\GameFlow\gameFlow;

function brainprogression()
{
    $gameSet = generateGameSet();
    $greeting = generateGreeting();
    gameFlow($greeting, $gameSet);
}

function generateGreeting()
{
    return "What number is missing in the progression?";
}

function generateGameSet()
{
    $gameSet = [];
    for ($round = 0; $round < 3; $round += 1) {
        $progression = generateProgression();
        $questionIndex = array_rand($progression);
        $correctAnswer = $progression[$questionIndex];
        $question = generateQuestion($progression, $questionIndex);

        $gameSet[] = [$question, $correctAnswer];
    }
    return $gameSet;
}

function generateProgression()
{
    $progression = [];
    $step = rand(1, 20);
    $base = rand(-50, 50);

    for ($i = 0; $i < 10; $i += 1) {
        $progression[] = $base + $step * $i;
    }

    return $progression;
}

function generateQuestion($progression, $questionIndex)
{
    $progression[$questionIndex] = '..';
    return implode($progression, ' ');
}
