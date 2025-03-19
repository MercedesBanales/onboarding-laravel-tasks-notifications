<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\DataTransferObjects;

use Lightit\Backoffice\Tasks\App\Enums\TaskStatus;

class TaskDto
{
    public function __construct(
        public readonly string|null $title,
        public readonly string|null $description,
        public readonly TaskStatus|null $status,
        public readonly int|null $employee_id,
    ) {
    }
}
