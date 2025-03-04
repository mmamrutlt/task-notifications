<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;

class UpdateTaskRequest extends FormRequest
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const STATUS = 'status';

    public const EMPLOYEE_ID = 'employee_id';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::TITLE => ['sometimes', 'string'],
            self::DESCRIPTION => ['sometimes', 'string'],
            self::STATUS => ['sometimes', 'string'],
            self::EMPLOYEE_ID => ['sometimes', 'nullable', 'integer', Rule::exists((new Employee())->getTable(), 'id')],
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->has(self::TITLE) ? $this->string(self::TITLE)->toString() : null,
            description: $this->has(self::DESCRIPTION) ? $this->string(self::DESCRIPTION)->toString() : null,
            status: $this->has(self::STATUS) ? $this->string(self::STATUS)->toString() : null,
            employeeId: $this->has(self::EMPLOYEE_ID) ? $this->integer(self::EMPLOYEE_ID) : null,
        );
    }
}
