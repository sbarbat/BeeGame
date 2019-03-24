<?php

namespace Sbarbat\Chip\Characters;

use Sbarbat\Chip\Characters\Hive\HiveInterface;

interface FactoryInterface
{
    public function new(): HiveInterface;
}
