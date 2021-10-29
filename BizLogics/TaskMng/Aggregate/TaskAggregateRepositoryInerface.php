<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\Aggregate;

use Bizlogics\TaskMng\Aggregate\Task\Task;

interface TaskAggregateRepositoryInerface
{
    function save(Task $taskAggregate): int;
    function findById(int $taskId): Task;
}
