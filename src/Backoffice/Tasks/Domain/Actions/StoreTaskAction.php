<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\App\Notifications\TaskCreated;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = new Task([
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus(),
            'employee_id' => $taskDto->getEmployeeId(),
        ]);

        $task->save();

        if ($taskDto->getEmployeeId()) {
            $task->employee->notify(new TaskCreated($task));
        }

        return $task;
    }
}
