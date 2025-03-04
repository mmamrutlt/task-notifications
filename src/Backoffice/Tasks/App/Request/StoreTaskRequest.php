<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;

class StoreTaskRequest extends FormRequest
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
            self::TITLE => ['required'],
            self::DESCRIPTION => ['required'],
            self::STATUS => ['required'],
            self::EMPLOYEE_ID => [],
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $this->string(self::STATUS)->toString(),
            employeeId: $this->has(self::EMPLOYEE_ID) ? $this->integer(self::EMPLOYEE_ID) : null,
        );
    }
}
