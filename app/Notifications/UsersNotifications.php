<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsersNotifications extends Notification
{
    use Queueable;
    public $user_id;
    private $name;
    private $status;

    public function __construct($user_id, $name, $status)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->status = $status;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $action = $this->getActionText($this->status);

        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'status' => $this->status,
            'action' => $action,
        ];
    }

    private function getActionText(string $status): string
    {
        switch ($status) {
            case 'add':
                return 'added';
            case 'delete':
                return 'deleted';
            case 'update':
                return 'updated';
            default:
                return 'modified';
        }
    }
}
