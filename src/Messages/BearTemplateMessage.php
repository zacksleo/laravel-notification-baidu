<?php

namespace Zacksleo\LaravelNotificationBaidu\Messages;

class BearTemplateMessage
{
    /**
     * Payload.
     *
     * @var array
     */
    private $payload;

    /**
     * 接收用户.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param string $openid
     *
     * @return BearTemplateMessage
     */
    public function to($openid)
    {
        $this->payload['touser'] = $openid;

        return $this;
    }

    /**
     * 模板ID
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param string $templateId
     *
     * @return BearTemplateMessage
     */
    public function template($templateId)
    {
        $this->payload['template_id'] = $templateId;

        return $this;
    }

    /**
     * 跳转地址.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param string $url
     *
     * @return BearTemplateMessage
     */
    public function url($url)
    {
        $this->payload['url'] = $url;

        return $this;
    }

    /**
     * Target data.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param array $data
     *
     * @return BearTemplateMessage
     */
    public function data(array $data)
    {
        $this->payload['data'] = $data;

        return $this;
    }

    /**
     * Footer data.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param array $data
     *
     * @return BearTemplateMessage
     */
    public function footer(array $data)
    {
        $this->payload['footer'] = $data;

        return $this;
    }

    /**
     * 消息数据.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @return array
     */
    public function getPayload()
    {
        return $this->payload;
    }
}
