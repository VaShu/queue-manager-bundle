<?php
/**
 * Created by mcfedr on 8/4/16 12:03
 */
namespace Mcfedr\QueueManagerBundle\Event;

use Mcfedr\QueueManagerBundle\Queue\Job;
use Symfony\Component\EventDispatcher\Event;

abstract class JobEvent extends Event
{
    /**
     * @var Job
     */
    private $job;

    /**
     * @param Job $job
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * @return Job
     */
    public function getJob()
    {
        return $this->job;
    }
}
