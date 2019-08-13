<?php

namespace Zacksleo\LaravelNotificationBaidu;

use EaseBaidu\Service\Bear\Application;
use Illuminate\Notifications\Notification;

class BearChannel
{
    /**
     * 公众账号.
     *
     * @var app
     */
    protected $app;

    /**
     * Bootstrap.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param Application $app
     */
    public function __construct(Application $app = null)
    {
        if ($app == null) {
            $this->app = \EaseBaidu::officialAccount();
        } else {
            $this->app = $app;
        }
    }

    /**
     * Send the given notification.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param mixed        $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return array
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toBaiduBear($notifiable);
        $data = $message->getPayload();

        return $this->app->template_message->send($data);
    }
}
