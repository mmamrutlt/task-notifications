<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\DataTransferObjects;

class TaskDto
{
    public function __construct(
        private readonly string|null $title,
        private readonly string|null $description,
        private readonly string|null $status,
        private readonly int|null $employeeId,
    ) {
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function getStatus(): string|null
    {
        return $this->status;
    }

    public function getEmployeeId(): int|null
    {
        return $this->employeeId;
    }
}
