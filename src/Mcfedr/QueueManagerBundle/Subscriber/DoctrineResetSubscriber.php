<?php
/**
 * Created by mcfedr on 8/4/16 12:12
 */
namespace Mcfedr\QueueManagerBundle\Subscriber;

use Mcfedr\QueueManagerBundle\Command\RunnerCommand;
use Mcfedr\QueueManagerBundle\Event\FailedJobEvent;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Mcfedr\QueueManagerBundle\Event\FinishedJobEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DoctrineResetSubscriber implements EventSubscriberInterface
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine = null)
    {
        $this->doctrine = $doctrine;
    }

    public function onJobFailed(FailedJobEvent $e)
    {
        $this->reset();
    }

    public function onJobFinished(FinishedJobEvent $e)
    {
        $this->reset();
    }

    private function reset()
    {
        $this->doctrine && $this->doctrine->resetManager();
    }

    public static function getSubscribedEvents()
    {
        return [
            RunnerCommand::JOB_FINISHED_EVENT => 'onJobFinished',
            RunnerCommand::JOB_FAILED_EVENT => 'onJobFailed'
        ];
    }
}