<?php
/**
 * 代理商数据
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/29
 * Time: 16:16
 */
require __DIR__.'/../../index.php';
require __DIR__.'/../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Report()->audienceAge();
$args = [];
$req->setArgs($args);

print_r($client->excute($req));
