<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\DataTransferObjects;

class AssignTaskDto
{
    public function __construct(
        private readonly int $employeeId,
    ) {
    }

    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }
}
