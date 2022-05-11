<?php
/**
 * 更新创意状态
 * User: yueguang
 * Date: 2022/4/13
 * Time: 14:11
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$req = $client::AdvertisingOriginality()->CreativeUpdateStatus()->setAdvertiserId(ADVERTISER_ID)
    ->setCreativeIds(['1625331325456445'])
    ->setOptStatus('disable')->send();
var_dump($req->getBody());
