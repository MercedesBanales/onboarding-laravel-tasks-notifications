<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpdateTaskAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(Task $task, TaskDto $dto): Task
    {
        $task->update([
            'title' => $dto->getTitle() ?? $task->title,
            'description' => $dto->getDescription() ?? $task->description,
            'employee_id' => $dto->getEmployeeId() ?? $task->employee_id
        ]);

        return $task;
    }
}
