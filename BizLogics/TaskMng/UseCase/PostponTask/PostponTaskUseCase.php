<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\UseCase\PostponTask;

use Bizlogics\TaskMng\Aggregate\TaskAggregateRepositoryInerface;

final class PostponTaskUseCase
{
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
        $this->taskRepos->save($task->doPostpone());
    }
}
