<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Lightit\Backoffice\Tasks\App\Requests\StoreTaskRequest;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\StoreTaskAction;

class StoreTaskController
{
    public function __invoke(StoreTaskRequest $request, StoreTaskAction $action) {
        $task = $action->execute($request->toDto());

        return responder()
            ->success($task, TaskTransformer::class)
            ->respond();
    }
}
