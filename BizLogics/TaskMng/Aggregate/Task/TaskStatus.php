<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\Aggregate\Task;

final class TaskStatus
{
    private const UNDONE    = 0;
    private const DONE      = 1;

    private int $rawValue;

    private function __construct(int $rawValue)
    {
        $this->rawValue = $rawValue;
    }

    public function raw(): int
    {
        return $this->rawValue;
    }
    public static function getByRaw(int $raw): self
    {
        switch ($raw) {
            case self::UNDONE:
                return new self(self::UNDONE);
            case self::DONE:
                return new self(self::DONE);
            default:
                throw new \RuntimeException("不明な引数です");
        }
    }

    public static function done(): self
    {
        return new self(self::DONE);
    }

    public static function undone(): self
    {
        return new self(self::UNDONE);
    }
}
