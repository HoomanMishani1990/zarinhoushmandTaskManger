<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject(Lang::get('بازیابی رمز عبور'))
            ->line(Lang::get('شما این ایمیل را دریافت کرده‌اید زیرا درخواست بازیابی رمز عبور برای حساب کاربری خود داده‌اید.'))
            ->action(Lang::get('بازیابی رمز عبور'), $url)
            ->line(Lang::get('این لینک بازیابی رمز عبور تا :count دقیقه دیگر معتبر است.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('اگر شما درخواست بازیابی رمز عبور نداده‌اید، نیازی به انجام کاری نیست.'));
    }
} 