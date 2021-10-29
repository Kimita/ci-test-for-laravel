<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\UseCase\PostponTask;

use Bizlogics\TaskMng\Aggregate\TaskAggregateRepositoryInerface;

final class PostponTaskUseCase
{
    private const POSTPONE_MAX_COUNT = 3;

    private TaskAggregateRepositoryInerface $taskRepos;

    /**
     * @param TaskAggregateRepositoryInerface $taskRepos
     */
    public function __construct(TaskAggregateRepositoryInerface $taskRepos)
    {
        $this->taskRepos = $taskRepos;
    }

    public function execute(int $taskId): void
    {
        $task = $this->taskRepos->findById($taskId);
        if ($task->getPostponeCount() >= self::POSTPONE_MAX_COUNT) {
            throw new \InvalidArgumentException("最大延期回数を超過しています");
        }
        $task->setDueDate($task->getDueDate()->addDays(1));
        $task->setPostponeCount($task->getPostponeCount() + 1);
        $this->taskRepos->save($task);
    }
}
