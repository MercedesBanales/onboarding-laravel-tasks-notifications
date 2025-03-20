<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Enums;

enum TaskStatus: string
{
    case PENDING = 'pending';
    case INPROGRESS = 'in_progress';
    case COMPLETED = 'completed';
}
