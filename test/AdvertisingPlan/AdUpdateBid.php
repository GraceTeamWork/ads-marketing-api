<?php
/**
 * 更新计划出价
 * User: yueguang
 * Date: 2022/4/12
 * Time: 17:46
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
//方式一：
$req = $client::AdvertisingPlan()->AdUpdateBid()->setAdvertiserId(ADVERTISER_ID)
    ->setData([['ad_id' => '1624073474955267', 'bid' => 88]])->send();
//方式二：
$req = $client::AdvertisingPlan()->AdUpdateBid()->setAdvertiserId(ADVERTISER_ID)
    ->setAdIds(['1624073474955267'])->setBid('88')->send();
var_dump($req->getBody());

