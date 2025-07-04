<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class PushNotification extends Notification
{
  use Queueable;

  private $title;
  private $message;
  private $buttonName;
  private $buttonURL;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($title, $message, $buttonName, $buttonURL)
  {
    $this->title = $title;
    $this->message = $message;
    $this->buttonName = $buttonName;
    $this->buttonURL = $buttonURL;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
    return [WebPushChannel::class];
  }

  /**
   * Get the web-push representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return NotificationChannels\WebPush\WebPushMessage
   */
  public function toWebPush($notifiable)
  {
    $data = DB::table('basic_settings')->select('notification_image')->first();
    $notificationImage = $data->notification_image;

    return (new WebPushMessage)
      ->icon('assets/img/' . $notificationImage)
      ->title($this->title)
      ->body($this->message)
      ->action($this->buttonName, $this->buttonURL);
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
