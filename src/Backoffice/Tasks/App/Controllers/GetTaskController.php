<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class GetTaskController
{
    public function __invoke(Task $task) {
        return responder()
            ->success($task, TaskTransformer::class)
            ->respond();
    }
}
