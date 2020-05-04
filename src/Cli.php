<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to  the Brain Games!');
    line("");
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}");
}

