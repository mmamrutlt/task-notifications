<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class DeleteEmployeeController
{
    public function __invoke(Employee $employee): JsonResponse
    {
        $employee->delete();

        return responder()
            ->success()
            ->respond();
    }
}
