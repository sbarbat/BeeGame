<?php

namespace Sbarbat\Chip\Characters\Hive;

use Sbarbat\Chip\Characters\InsectInterface;

interface HiveInterface
{
    public function getBees(): array;

    public function addBee(InsectInterface $bee): void;

    public function pickBee(): InsectInterface;

    public function killAll(): void;

    public function getAliveBees(): array;

    public function getDeadBees(): array;

    public function hasAliveBees(): bool;

    public function hasDeadBees(): bool;
}
