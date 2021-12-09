<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class OrderCreated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = config('app.url');
        if (isset($this->order->user_id)) {
            $fullName = $this->order->user->full_name;
        } else if (isset($this->order->patronymic)) {
            $fullName = $this->order->surname.' '.$this->order->name.' '.$this->order->patronymic;
        } else {
            $fullName = $this->order->surname.' '.$this->order->name;
        }

        return (new MailMessage)
                    ->subject(Lang::get('Order Created Notification'))
                    ->greeting(Lang::get('Good day!'))
                    ->line(Lang::get(':fullName, You have successfully formed the order on our site :siteName.', ['fullName' => $fullName, 'siteName' => config('app.name')]))
                    ->line(Lang::get('Your order number № :orderNuber.', ['orderNuber' => $this->order->id]))
                    ->line(Lang::get('Created at: :createData.', ['createData' => date('d.m.y', strtotime($this->order->created_at))]))
                    ->action(Lang::get('Go to the site'), $url)
                    ->line(Lang::get('Thank you for the order!'))
                    ->salutation(Lang::get('Sincerely, Administration :siteName.', ['siteName' => config('app.name')]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
