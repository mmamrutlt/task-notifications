<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\AssignTaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Lightit\Backoffice\Tasks\App\Notifications\TaskAssigned;

class AssignTaskAction
{
    public function execute(Task $task, AssignTaskDto $assignTaskDto): Task
    {
        $task->employee_id = $assignTaskDto->getEmployeeId();
        $task->save();

        if ($assignTaskDto->getEmployeeId()) {
            $employee = $task->employee;
            $employee->notify(new TaskAssigned($task, $employee));
        }

        return $task;
    }
}
