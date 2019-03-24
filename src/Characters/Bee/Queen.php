<?php

namespace Sbarbat\Chip\Characters\Bee;

use Sbarbat\Chip\Characters\QueenInterface;

class Queen extends Bee implements QueenInterface
{
    const HIT_POINTS = 8;
    const START_LIFESPAN = 100;
}
