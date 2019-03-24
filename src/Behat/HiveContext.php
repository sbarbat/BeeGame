<?php

namespace Sbarbat\Chip\Behat;

use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

/**
 * Defines application features from the specific context.
 */
class HiveContext implements Context
{
    private $bee;

    /**
     * @Given there is a :class
     */
    public function thereIsA($class)
    {
        $class = sprintf('\Sbarbat\Chip\Characters\Bee\%s', $class);

        $this->bee = new $class();
    }

    /**
     * @Then the lifespan should be :arg1
     */
    public function theLifespanShouldBe($lifespan)
    {
        Assert::eq($this->bee->getLifespan(), $lifespan);
    }

    /**
     * @When I hit her
     */
    public function iHitHer()
    {
        $this->bee->hit();
    }
}
