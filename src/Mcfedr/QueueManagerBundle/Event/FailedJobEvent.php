<?php
/**
 * Created by mcfedr on 8/4/16 12:04
 */
namespace Mcfedr\QueueManagerBundle\Event;

use Mcfedr\QueueManagerBundle\Queue\Job;

class FailedJobEvent extends JobEvent
{
    /**
     * @var \Exception
     */
    private $exception;

    /**
     * @param \Exception $exception
     */
    public function __construct(Job $job, \Exception $exception)
    {
        parent::__construct($job);
        $this->exception = $exception;
    }

    /**
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }
}
