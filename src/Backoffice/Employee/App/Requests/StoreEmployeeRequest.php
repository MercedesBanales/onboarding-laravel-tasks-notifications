<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Users\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employee\Domain\DataTransferObjects\EmployeeDto;
use Lightit\Backoffice\Employee\Domain\Models\Employee;

class StoreUserRequest extends FormRequest
{
    public const NAME = 'name';
    public const EMAIL = 'email';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required'],
            self::EMAIL => ['required', Rule::email()->strict(), Rule::unique((new Employee())->getTable())],
        ];
    }

    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            name: $this->string(self::NAME)->toString(),
            email: $this->string(self::EMAIL)->toString(),
        );
    }
}
