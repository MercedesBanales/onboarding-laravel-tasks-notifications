<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class EmployeeTransformer extends Transformer
{
    /**
     * @return array{id: int, name: string, email: string, tasks: Collection<int, Task>}
     */
    public function transform(Employee $employee): array
    {
        return [
            'id' => $employee->id,
            'name' => $employee->name,
            'email' => $employee->email,
            'tasks' => $employee->tasks,
        ];
    }
}
