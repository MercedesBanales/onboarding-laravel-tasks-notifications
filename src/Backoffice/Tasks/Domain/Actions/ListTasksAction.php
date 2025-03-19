<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class ListTasksAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Task::class)
            ->get();
    }
}
