<?php

namespace App\Http\Controllers\Kafka;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
    public function producer()
    {
        $config = \Kafka\ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('172.21.0.13:9092');
        $config->setBrokerVersion('0.8.2.1');
        $config->setRequiredAck(1);
        $config->setIsAsyn(false);
        $config->setProduceInterval(500);
        $producer = new \Kafka\Producer(function () {
            return array(
                array(
                    'topic' => 'doc_ant_web',
                    'value' => 'test....message.',
                    'key' => 'testkey',
                ),
            );
        });

        $producer->success(function ($result) {
            var_dump($result);
        });
        $producer->error(function ($errorCode) {
            var_dump($errorCode);
        });
        $producer->send(true);
    }

    public function consumer()
    {
        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('10.13.4.159:9192');
        $config->setGroupId('test');
        $config->setBrokerVersion('0.8.2.1');
        $config->setTopics(array('test'));
        //$config->setOffsetReset('earliest');
        $consumer = new \Kafka\Consumer();
        $consumer->start(function ($topic, $part, $message) {
            var_dump($message);
        });
    }
}
