<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employees\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class StoreTaskAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(TaskDto $dto): Task
    {
        $task = new Task([
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
            'employee_id' => $dto->employee_id,
        ]);

        $task->save();
        Employee::find($dto->employee_id)->notify(new TaskAssignmentNotification($task));

        return $task;
    }
}
