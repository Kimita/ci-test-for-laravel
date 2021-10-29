<?php
declare(strict_types=1);

namespace Bizlogics\TaskMng\Aggregate\Task;

final class Task
{
    private int $id;
    private TaskStatus $taskStatus;
    private String $name;
    private LocalDate $dueDate;
    private int $postponeCount;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return TaskStatus
     */
    public function getTaskStatus(): TaskStatus
    {
        return $this->taskStatus;
    }

    /**
     * @param TaskStatus $taskStatus
     */
    public function setTaskStatus(TaskStatus $taskStatus): void
    {
        $this->taskStatus = $taskStatus;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return LocalDate
     */
    public function getDueDate(): LocalDate
    {
        return $this->dueDate;
    }

    /**
     * @param LocalDate $dueDate
     */
    public function setDueDate(LocalDate $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return int
     */
    public function getPostponeCount(): int
    {
        return $this->postponeCount;
    }

    /**
     * @param int $postponeCount
     */
    public function setPostponeCount(int $postponeCount): void
    {
        $this->postponeCount = $postponeCount;
    }

}
