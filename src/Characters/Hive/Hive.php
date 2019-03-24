<?php

namespace Sbarbat\Chip\Characters\Hive;

use Sbarbat\Chip\Characters\InsectInterface;
use Sbarbat\Chip\Characters\Bee\Queen;
use Sbarbat\Chip\Characters\Bee\Worker;
use Sbarbat\Chip\Characters\Bee\Drone;

class Hive implements HiveInterface
{
    private $bees;

    public function __construct(int $workersNumber = 5, int $dronesNumber = 8)
    {
        $this->bees = array(
            new Queen(),
        );

        for ($i = 0; $i <= $workersNumber; ++$i) {
            $this->bees[] = new Worker();
        }

        for ($i = 0; $i <= $dronesNumber; ++$i) {
            $this->bees[] = new Drone();
        }
    }

    public function getBees(): array
    {
        return $this->bees;
    }

    public function addBee(InsectInterface $bee): void
    {
        $this->bees[] = $bee;
    }

    public function pickBee(): InsectInterface
    {
        return $this->bees[array_rand($this->bees)];
    }

    public function killAll(): void
    {
        foreach ($this->bees as $bee) {
            $bee->kill();
        }
    }

    public function getAliveBees(): array
    {
        return array_filter($this->bees, function ($bee) {
            return $bee->getCanFly();
        });
    }

    public function getDeadBees(): array
    {
        return array_filter($this->bees, function ($bee) {
            return !$bee->getCanFly();
        });
    }

    public function hasAliveBees(): bool
    {
        return count($this->getAliveBees()) > 0;
    }

    public function hasDeadBees(): bool
    {
        return count($this->getDeadBees()) > 0;
    }
}
