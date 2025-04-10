<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\DataTransferObjects;

use Lightit\Backoffice\Tasks\App\Enums\TaskStatus;

readonly class TaskDto
{
    public function __construct(
        public string|null $title,
        public string|null $description,
        public TaskStatus|null $status,
        public int|null $employee_id,
    ) {
    }
}
