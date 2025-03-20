<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employees\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpdateTaskAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(Task $task, TaskDto $dto): Task
    {
        $task_reassigned = $dto->employee_id && $dto->employee_id !== $task->employee_id;

        $task->update([
            'title' => $dto->title ?? $task->title,
            'description' => $dto->description ?? $task->description,
            'status' => $dto->status ?? $task->status,
            'employee_id' => $dto->employee_id ?? $task->employee_id,
        ]);

        if ($task_reassigned) {
            Employee::find($dto->employee_id)->notify(new TaskAssignmentNotification($task));
        }

        return $task;
    }
}
