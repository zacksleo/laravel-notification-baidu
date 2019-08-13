<?php

namespace Zacksleo\LaravelNotificationBaidu\Messages;

class SmartProgramTemplateMessage
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
     * @return SmartProgramTemplateMessage
     */
    public function to($openid)
    {
        $this->payload['touser_openId'] = $openid;

        return $this;
    }

    /**
     * 所需下发的模板消息的id
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param string $templateId
     *
     * @return SmartProgramTemplateMessage
     */
    public function template($templateId)
    {
        $this->payload['template_id'] = $templateId;

        return $this;
    }

    /**
     * 跳转小程序页面地址 pages/xxx/xxx?f=xxxx.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param string $page
     *
     * @return SmartProgramTemplateMessage
     */
    public function page($page)
    {
        $this->payload['page'] = $page;

        return $this;
    }

    /**
     * 表单提交场景下，为 submit 事件带上的 formId；支付场景下，为本次支付的 payId、orderId.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param string $sceneId
     *
     * @return SmartProgramTemplateMessage
     */
    public function sceneId($sceneId)
    {
        $this->payload['scene_id'] = $sceneId;

        return $this;
    }

    /**
     * 场景id类型，1：表单；2：百度收银台订单；3:直连订单.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param int $sceneType
     *
     * @return SmartProgramTemplateMessage
     */
    public function sceneType($sceneType)
    {
        $this->payload['scene_type'] = $sceneType;

        return $this;
    }

    /**
     * Target data.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param array $data
     *
     * @return SmartProgramTemplateMessage
     */
    public function data(array $data)
    {
        $this->payload['data'] = $data;

        return $this;
    }

    /**
     * Ext data.
     *
     * @author zacksleo <zacksleo@gmail.com>
     *
     * @param array $ext
     *
     * @return SmartProgramTemplateMessage
     */
    public function ext(array $ext)
    {
        $this->payload['ext'] = $ext;

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
        if (substr($this->payload['sceneId'], -1) === 0) {
            $this->payload['touser'] = $this->payload['touser_openId'];
            unset($this->payload['touser_openId']);
        }

        return $this->payload;
    }
}
