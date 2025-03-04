<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Request\UpdateTaskRequest;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\UpdateTaskAction;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpdateTaskController
{
    public function __invoke(
        Task $task,
        UpdateTaskRequest $request,
        UpdateTaskAction $updateTaskAction,
    ): JsonResponse {
        $updatedTask = $updateTaskAction->execute($task, $request->toDto());

        return responder()
            ->success($updatedTask, TaskTransformer::class)
            ->respond();
    }
}
