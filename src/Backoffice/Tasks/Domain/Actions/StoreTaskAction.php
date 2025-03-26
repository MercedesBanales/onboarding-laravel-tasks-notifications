<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Employees\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $dto): Task
    {
        $task = Task::create([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
            'employee_id' => $dto->employee_id,
        ]);

        Employee::findOrFail($dto->employee_id)->notify(new TaskAssignmentNotification($task));

        return $task;
    }
}
