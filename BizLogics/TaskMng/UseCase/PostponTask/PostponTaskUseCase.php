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
        try {
            $task = $this->taskRepos->findById($taskId);
            $this->taskRepos->save($task->doPostpone());
        } catch (\Throwable $e) {
            logger(__METHOD__, [
                get_class($e),
                $e->getMessage()
            ]);
            throw new \RuntimeException('内部エラーが発生しました。詳細はシステムログを確認してください。');
        }
    }
}
