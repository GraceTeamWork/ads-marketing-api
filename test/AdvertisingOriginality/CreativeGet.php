<?php
/**
 * 获取创意列表
 * User: yueguang
 * Date: 2022/4/13
 * Time: 10:00
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$req = $client::AdvertisingOriginality()->CreativeGet()->setAdvertiserId(ADVERTISER_ID)->send();
var_dump($req->getBody());
