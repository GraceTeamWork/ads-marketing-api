<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/12
 * Time: 10:42
 */

require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);
$req = $client::Tool()->picToVideo->taskCreate();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setTemplateType('images_vertical');
$req->setMusicName('6JCM5a6g.5Zyj6K-e5rGq5rGq5rGq77yB');
$req->setMapIdResource([
    "image1" => "http://sf6-ttcdn-tos.pstatp.com/obj/web.business.image/20180508fe69b5eed645736046bebd60",
]);
$req->setCallbackUrl(CALLBACK_URL);
print_r($client->excute($req));


