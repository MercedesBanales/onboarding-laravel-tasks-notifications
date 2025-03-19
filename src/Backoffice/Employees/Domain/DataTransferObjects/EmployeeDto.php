<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\DataTransferObjects;

class EmployeeDto
{
    public function __construct(
        private readonly string $name,
        private readonly string $email,
        private readonly array $tasks = [],
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }
}
