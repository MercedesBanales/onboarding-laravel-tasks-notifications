<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\App\Enums\TaskStatus;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->enum('status', array_column(TaskStatus::cases(), 'value'))
                ->defaultValue(TaskStatus::PENDING);      
            $table->foreignIdFor(Employee::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
