<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/17
 * Time: 16:29
 */

namespace ToutiaoSdk;

use core\Exception\InvalidParamException;
use core\Exception\TouTiaoException;
use core\Http\HttpRequest;
use core\Profile\RequestInteface;

class TouTiaoClient
{
    public static $access_token;

    public static $server_url = 'https://ad.oceanengine.com/open_api';

    public static $box_url = 'https://ad.oceanengine.com/open_api';

    public static $is_sanbox = false;

    private static $instance = null;

    // 禁止被实例化
    private function __construct($access_token, $is_sanbox, $server_url, $box_url)
    {
        static::$access_token = $access_token;
        static::$is_sanbox = $is_sanbox;
        if (null !== $server_url) static::$server_url = $server_url;
        if (null !== $box_url) static::$box_url = $box_url;
    }

    // 禁止clone
    private function __clone(){}

    //  实例化自己并保存到$instance中，已实例化则直接调用
    public static function getInstance($access_token, $is_sanbox, $server_url, $box_url): object
    {
        if (empty(self::$instance)) {
            self::$instance = new self($access_token, $is_sanbox, $server_url, $box_url);
        }
        return self::$instance;
    }

    /**
     * @param RequestInteface $request
     * @param null $url
     * @return \core\Http\HttpResponse
     * @throws TouTiaoException
     */
    public function excute(RequestInteface $request, $url = null)
    {
        $request->check();
        $params = $request->getParams();
        $headers = [
            'Access-Token' => static::$access_token,
            'Content-Type' => $request->getContentType(),
            'X-Debug-Mode' => 1,
        ];
        if (null == $url) {
            $url = $request->getUrl();
            if ('' == $url) {
                throw new InvalidParamException('Http url is required, and now url is \' \'');
            }
            if ("http" != substr($url, 0, 4)) {
                $url = (static::$is_sanbox ? static::$box_url : static::$server_url) . $request->getUrl();
            }
        }
        if (strpos($request->getContentType(), "json") > 0) {
            $params = json_encode($params);
        }
        HttpRequest::$readTimeout = $request->getTimeout();
        return HttpRequest::curl($url, $request->getMethod(), $params, $headers);
    }

    public static function Report()
    {
        return new \Report\Module(self::$instance);
    }

    public static function AdvertisingDelivery()
    {
        return new \AdvertisingDelivery\Module(self::$instance);
    }

    public static function AdvertisingOriginality()
    {
        return new \AdvertisingOriginality\Module(self::$instance);
    }

    public static function AdvertisingPlan()
    {
        return new \AdvertisingPlan\Module(self::$instance);
    }

    public static function Dmp()
    {
        return new \Dmp\Module(self::$instance);
    }

    public static function Tool()
    {
        return new \Tool\Module(self::$instance);
    }

    public static function Advertiser()
    {
        return new \Advertiser\Module(self::$instance);
    }
}
