<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class UserCreated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
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

        return (new MailMessage)
                    ->subject(Lang::get('User Created Notification'))
                    ->greeting(Lang::get('Good day!'))
                    ->line(Lang::get(':fullName, You have successfully registered on the site :siteName.', ['fullName' => $this->user->full_name, 'siteName' => config('app.name')]))
                    ->line(Lang::get('Your login: :userLogin.', ['userLogin' => $this->user->email]))
                    ->line(Lang::get('Your password: :userPassword.', ['userPassword' => $this->password]))
                    ->action(Lang::get('Go to the site'), $url)
                    ->line(Lang::get('Thanks for signing up!'))
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
