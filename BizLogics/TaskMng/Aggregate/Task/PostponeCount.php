<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\Aggregate\Task;

final class PostponeCount
{
    private const MAX_COUNT = 3;
    private int $count;

    /**
     * @param int $count
     */
    private function __construct(int $count = 0)
    {
        if ($count > self::MAX_COUNT) {
            throw new \InvalidArgumentException("最大延期回数を超過しています");
        }
        $this->count = $count;
    }

    public static function init(): self
    {
        return new self(0);
    }

    public function add(): self
    {
        return new self($this->count + 1);
    }
}
