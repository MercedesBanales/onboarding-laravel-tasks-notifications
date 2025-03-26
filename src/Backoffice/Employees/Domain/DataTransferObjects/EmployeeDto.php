<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\DataTransferObjects;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class EmployeeDto
{
    /**
     * @param Collection<int, Task> $tasks
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly Collection $tasks = new Collection([]),
    ) {
    }
}
