<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;

class UpdateTaskRequest extends FormRequest
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const EMPLOYEE_ID = 'employee_id';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::EMPLOYEE_ID => [Rule::exists('employees', 'id')]
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)?->toString()? : null,
            description: $this->string(self::DESCRIPTION)?->toString()? : null,
            employee_id: $this->integer(self::EMPLOYEE_ID)? : null
        );
    }
}
