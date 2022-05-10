<?php
/**
 * 更新计划预算
 * User: yueguang
 * Date: 2022/4/12
 * Time: 17:37
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$req = $client::AdvertisingPlan()->AdUpdateBudget()->setAdvertiserId(ADVERTISER_ID)
    ->setData([['ad_id' => '1624073474955267', 'budget' => 155]])->send();//注意是二维
var_dump($req->getBody());
