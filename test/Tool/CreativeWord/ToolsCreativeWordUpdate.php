<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/31
 * Time: 14:13
 */
require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Tool()->creativeWord->update();

$req->setAdvertiserId(ADVERTISER_ID);
$req->setCreativeWordId('8250');
$req->setName('我再测测');
$req->setDefaultWord('测测');
$req->setWords(['试']);

print_r($client->excute($req));
