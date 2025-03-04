<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskAssigned extends Notification implements ShouldQueue, ShouldBeEncrypted
{
    use Queueable;

    public function __construct(
        private readonly Task $task,
        private readonly Employee $employee,
    ) {
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
                    ->subject("{$this->employee->name}, you have been assigned a new task")
                    ->line("Task: {$this->task->title}")
                    ->line("Description: {$this->task->description}")
                    ->line("State: {$this->task->status}")
                    ->action('Go to task!', url('/tasks/' . $this->task->id));
    }
}
