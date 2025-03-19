<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class StoreTaskAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(TaskDto $dto): Task
    {
        $task = new Task([
            'title' => $dto->getTitle(),
            'description' => $dto->getDescription(),
            'employee_id' => $dto->getEmployeeId()
        ]);

        $task->save();

        return $task;
    }
}
