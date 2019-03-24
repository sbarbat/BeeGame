<?php

namespace Sbarbat\Chip\Characters\Hive;

use Sbarbat\Chip\Characters\FactoryInterface;

class HiveFactory implements FactoryInterface
{
    public function new(): HiveInterface
    {
        return new Hive();
    }
}
