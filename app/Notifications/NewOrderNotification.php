<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Store notification in database.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'order_id'   => $this->order->id,
            'user_name'  => $this->order->user->name ?? 'Guest',
            'car_name'   => $this->order->product->name ?? '-',
            'message'    => 'New car booking received',
            'url'        => route('orders.index'),
            'created_at' => now()->toDateTimeString(),
        ];
    }

    /**
     * Optional: same data if Laravel uses array channel representation.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id'   => $this->order->id,
            'user_name'  => $this->order->user->name ?? 'Guest',
            'car_name'   => $this->order->product->name ?? '-',
            'message'    => 'New car booking received',
            'url'        => route('orders.index'),
            'created_at' => now()->toDateTimeString(),
        ];
    }
}

