<?php

namespace MarcW\RssWriter\Extension\Sy;

use Symfony\Component\Validator\Constraints as Assert;

class Sy
{
    const PERIOD_HOURLY = 'hourly';
    const PERIOD_DAILY = 'daily';
    const PERIOD_WEEKLY = 'weekly';
    const PERIOD_MONTHLY = 'monthly';
    const PERIOD_YEARLY = 'yearly';

    private $updatePeriod;

    /**
     * @Assert\GreaterThan(0)
     */
    private $updateFrequency;
    private $updateBase;

    public function setUpdatePeriod($updatePeriod)
    {
        $this->updatePeriod = $updatePeriod;

        return $this;
    }

    public function getUpdatePeriod()
    {
        return $this->updatePeriod;
    }

    public function setUpdateFrequency($updateFrequency)
    {
        $this->updateFrequency = $updateFrequency;

        return $this;
    }

    public function getUpdateFrequency()
    {
        return $this->updateFrequency;
    }

    public function setUpdateBase(\DateTime $updateBase = null)
    {
        $this->updateBase = $updateBase;

        return $this;
    }

    public function getUpdateBase()
    {
        return $this->updateBase;
    }
}
