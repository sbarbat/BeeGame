<?php

namespace Sbarbat\Chip\Characters;

interface InsectInterface
{
    public function getLifespan(): int;

    public function getCanFly(): bool;

    public function kill(): void;
}
