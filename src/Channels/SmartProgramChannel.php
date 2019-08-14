<?php

namespace Zacksleo\LaravelNotificationBaidu;

use EaseBaidu\Service\SmartProgram\Application;
use Illuminate\Notifications\Notification;

/**
 * 小程序消息发送通道
 *
 * @property \EaseBaidu\Service\SmartProgram\Application $app
 */
class SmartProgramChannel
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
            $this->app = \EaseBaidu::smartProgram();
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
        $message = $notification->toBaiduSmartProgram($notifiable);
        $data = $message->getPayload();

        return $this->app->template_message->send($data);
    }
}
