<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/30
 * Time: 11:50
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Dmp()->dataSourceRead();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setDataSourceIdList(['067d127009514acfb2eb7b2f022ab7f4']);

print_r($client->excute($req));
