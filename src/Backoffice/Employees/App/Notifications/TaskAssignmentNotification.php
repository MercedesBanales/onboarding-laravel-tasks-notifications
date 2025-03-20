<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Notifications;

use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskAssignmentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public const SUBJECT = 'Task has been assigned to you | ';

    public function __construct(private Task $task)
    {
        $this->onConnection(env('QUEUE_CONNECTION'));
    }

    /**
     * @return array<int, string>
     */
    public function via(Employee $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(Employee $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject(self::SUBJECT . $this->formatDate($this->task->created_at))
            ->view('mail.assigned-task', ['task' => $this->task, 'mail_from' => env('MAIL_FROM_NAME')]);
    }

    private function formatDate(DateTime $date) {
        return date_format($date, 'd/m/Y');
    }
}
