<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\DataTransferObjects;

class EmployeeDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly array $tasks = [],
    ) {
    }
}
