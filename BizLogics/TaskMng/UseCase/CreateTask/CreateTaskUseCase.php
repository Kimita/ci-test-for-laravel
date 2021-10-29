<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\UseCase\CreateTask;

use Bizlogics\TaskMng\Aggregate\Task\LocalDate;
use Bizlogics\TaskMng\Aggregate\Task\Task;
use Bizlogics\TaskMng\Aggregate\Task\TaskStatus;
use Bizlogics\TaskMng\Aggregate\TaskAggregateRepositoryInerface;

final class CreateTaskUseCase
{
    private TaskAggregateRepositoryInerface $taskRepos;

    /**
     * @param TaskAggregateRepositoryInerface $taskRepos
     */
    public function __construct(TaskAggregateRepositoryInerface $taskRepos)
    {
        $this->taskRepos = $taskRepos;
    }

    public function execute(String $name, LocalDate $dueDate): int
    {
        if (is_null($name) || is_null($dueDate)) {
            throw new \InvalidArgumentException("必須項目が設定されていません");
        }
        $task = new Task();
        $task->setTaskStatus(TaskStatus::undone());
        $task->setName($name);
        $task->setDueDate($dueDate);
        $task->setPostponeCount(0);
        return $this->taskRepos->save($task);
    }
}
