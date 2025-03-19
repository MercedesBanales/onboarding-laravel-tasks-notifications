<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;

class StoreTaskRequest extends FormRequest
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
            self::TITLE => ['required'],
            self::DESCRIPTION => ['required'],
            self::EMPLOYEE_ID => ['required', Rule::exists('employees', 'id')]
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            employee_id: $this->integer(self::EMPLOYEE_ID)
        );
    }
}
