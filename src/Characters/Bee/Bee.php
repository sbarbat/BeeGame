<?php

namespace Sbarbat\Chip\Characters\Bee;

use Sbarbat\Chip\Characters\HitableInterface;
use Sbarbat\Chip\Characters\InsectInterface;

class Bee implements HitableInterface, InsectInterface
{
    const HIT_POINTS = 10;
    const START_LIFESPAN = 75;

    private $lifespan;

    public function __construct()
    {
        $this->lifespan = static::START_LIFESPAN;
    }

    public function hit(): string
    {
        $this->lifespan -= static::HIT_POINTS;

        return sprintf(
            'Direct Hit. You took %s hit points from a %s bee',
            static::HIT_POINTS,
            substr(strrchr(get_class($this), '\\'), 1)
        );
    }

    public function getLifespan(): int
    {
        return $this->getCanFly() ? $this->lifespan : 0;
    }

    public function getCanFly(): bool
    {
        return $this->lifespan > 0;
    }

    public function kill(): void
    {
        $this->lifespan = 0;
    }
}
