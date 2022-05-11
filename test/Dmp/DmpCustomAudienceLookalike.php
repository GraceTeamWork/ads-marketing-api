<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/30
 * Time: 16:30
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Dmp()->customAudienceLookalike();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setCustomAudienceId('110206880');
$req->setLookalikeNum(110000);
$req->setName('test-test');
$req->setTag('测试的，别乱动');

print_r($client->excute($req));
