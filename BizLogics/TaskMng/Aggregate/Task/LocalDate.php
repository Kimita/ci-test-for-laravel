<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\Aggregate\Task;

final class LocalDate
{
    public function addDays(int $days): self
    {
        // TODO: 加算した新しいインスタンスを返す
        return new self();
    }
}
