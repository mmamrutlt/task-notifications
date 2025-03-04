<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, TaskDto $taskDto): Task
    {
        if ($taskDto->getTitle() !== null) {
            $task->title = $taskDto->getTitle();
        }

        if ($taskDto->getDescription() !== null) {
            $task->description = $taskDto->getDescription();
        }

        if ($taskDto->getStatus() !== null) {
            $task->status = $taskDto->getStatus();
        }

        if ($taskDto->getEmployeeId() !== null) {
            $task->employee_id = $taskDto->getEmployeeId();
        }
        
        $task->save();

        return $task;
    }
}
