<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Broadcast;

class NewOrderNotification extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Order
     */
    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // mail , database, broadcast, vonage (SMS), slack , twillo (SMS)
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Order #'. $this->order->id)
            ->greeting('Hello '. $notifiable->name)
            ->line('A new order Has been created')
            ->action('View order', route('orders.show', $this->order->id))
            ->line('Thank you!');
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'body' => "A new order #{$this->order->id} has been created.",
            'icon' => 'fas fa-envelope',
            'link' => route('orders.show', $this->order->id),
        ]);
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'body' => "A new order #{$this->order->id} has been created",
            'icon' => 'fas fa-envelope',
            'link' => route('orders.show', $this->order->id),
            'time' => now()->diffForHumans(),
        ]);
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
