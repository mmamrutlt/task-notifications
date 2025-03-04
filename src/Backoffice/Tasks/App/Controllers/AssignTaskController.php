<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Request\AssignTaskRequest;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\AssignTaskAction;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class AssignTaskController
{
    public function __invoke(
        Task $task,
        AssignTaskRequest $request,
        AssignTaskAction $assignTaskAction,
    ): JsonResponse {
        $task = $assignTaskAction->execute($task, $request->toDto());

        return responder()
            ->success($task, TaskTransformer::class)
            ->respond();
    }
}
