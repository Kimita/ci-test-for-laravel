<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\UseCase\CreateTask;

use Bizlogics\TaskMng\Aggregate\Task\LocalDate;
use Bizlogics\TaskMng\Aggregate\Task\PostponeCount;
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
        try {
            $task = Task::buildForCreate($name,$dueDate);
            return $this->taskRepos->save($task);
        } catch (\Throwable $e) {
            logger(__METHOD__, [
                get_class($e),
                $e->getMessage()
            ]);
            throw new \RuntimeException('内部エラーが発生しました。詳細はシステムログを確認してください。');
        }
    }
}
