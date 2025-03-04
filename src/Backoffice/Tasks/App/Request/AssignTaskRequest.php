<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\AssignTaskDto;

class AssignTaskRequest extends FormRequest
{
    public const EMPLOYEE_ID = 'employee_id';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::EMPLOYEE_ID => ['required', 'integer', Rule::exists((new Employee())->getTable(), 'id')],
        ];
    }

    public function toDto(): AssignTaskDto
    {
        return new AssignTaskDto(
            employeeId: $this->integer(self::EMPLOYEE_ID),
        );
    }
}
