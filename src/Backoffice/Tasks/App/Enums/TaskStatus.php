<?php

namespace Lightit\Backoffice\Tasks\App\Enums;

enum TaskStatus: string
{
    case PENDING = 'pending';
    case INPROGRESS = 'in_progress';
    case COMPLETED = 'completed';
}
