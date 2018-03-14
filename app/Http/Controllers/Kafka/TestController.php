<?php

namespace App\Http\Controllers\Kafka;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kafka\Config;
use Kafka\Producer;
use Kafka\ProducerConfig;
use Kafka\Consumer;
use Kafka\ConsumerConfig;

class TestController extends Controller
{
    public function producer()
    {
        $config = ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('172.21.0.13:9092');
        $config->setBrokerVersion('0.8.2.1');
        $config->setRequiredAck(1);
        $config->setIsAsyn(false);
        $config->setProduceInterval(500);

        $producer = new Producer(function () {
            return [
                [
                    'topic' => 'doc_ant_wechat',
                    'value' => time(),
                    'key' => time(),
                ],
            ];
        });
        $producer->success(function ($result) {
            echo 'success';
            var_dump($result);
        });
        $producer->error(function ($errorCode) {
            echo 'error';
            var_dump($errorCode);
        });
        $producer->send(true);
    }

    public function consumer()
    {

        $config = ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('172.21.0.13:9092');
        $config->setGroupId('test');
        $config->setBrokerVersion('0.8.2.1');
        $config->setTopics(['doc_ant_wechat']);
        //$config->setOffsetReset('earliest');
        $consumer = new Consumer();
        $consumer->start(function ($topic, $part, $message) {
            var_dump($message);
        });
    }
}
