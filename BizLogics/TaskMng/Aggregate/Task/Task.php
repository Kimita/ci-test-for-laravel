<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\Aggregate\Task;

final class Task
{
    private const POSTPONED_DAYS_FOR_EACH_RUN = 1; // 延期実行ごとの延期できる日数

    private int $id;
    private TaskStatus $taskStatus;
    private String $name;
    private LocalDate $dueDate;
    private PostponeCount $postponeCount;

    /**
     * @param int $id
     * @param TaskStatus $taskStatus
     * @param String $name
     * @param LocalDate $dueDate
     * @param int $postponeCount
     */
    private function __construct(
        int $id,
        TaskStatus $taskStatus,
        string $name,
        LocalDate $dueDate,
        PostponeCount $postponeCount
    ) {
        $this->id = $id;
        $this->taskStatus = $taskStatus;
        $this->name = $name;
        $this->dueDate = $dueDate;
        $this->postponeCount = $postponeCount;
    }

    public static function buildForCreate(
        string $name,
        LocalDate $dueDate
    ): self {
        return new self(0, TaskStatus::undone(), $name, $dueDate, PostponeCount::init());
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return TaskStatus
     */
    public function getTaskStatus(): TaskStatus
    {
        return $this->taskStatus;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return LocalDate
     */
    public function getDueDate(): LocalDate
    {
        return $this->dueDate;
    }

    /**
     * @return int
     */
    public function getPostponeCount(): int
    {
        return $this->postponeCount;
    }

    public function doPostpone(): self
    {
        $this->dueDate = $this->getDueDate()->addDays(self::POSTPONED_DAYS_FOR_EACH_RUN);
        $this->postponeCount = $this->postponeCount->add();
        return $this;
    }
}
