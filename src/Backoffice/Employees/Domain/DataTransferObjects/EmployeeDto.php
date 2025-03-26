<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\DataTransferObjects;

use Illuminate\Database\Eloquent\Collection;

class EmployeeDto
{
    /**
     * @return Collection<int, Employee>
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly Collection $tasks = new Collection([]),
    ) {
    }
}
