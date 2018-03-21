<?php

namespace App\Facades\Kafka\Producer;

/**
 * Class Producer
 * @package App\Facades\Kafka\Producer
 */
class Producer
{
    /**
     * @param $action
     * @param $detail
     */
    public function producer($action, $detail)
    {
        $config = \Kafka\ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList(config('kafka.host').':'.config('kafka.port'));
        $config->setRequiredAck(1);
        $config->setIsAsyn(false);
        $config->setProduceInterval(config('kafka.produce_interval'));

        $producer = new \Kafka\Producer(function () use ($action, $detail) {
            return array(
                array(
                    'topic' => config('kafka.topic'),
                    'value' => $detail,
                    'key' => $action,
                ),
            );
        });
        $producer->success(function ($result) {
            \Log::info('kafka_success:'.json_encode($result));
        });
        $producer->error(function ($errorCode) {
            \Log::info('kafka_error:'.json_encode($errorCode));
        });
        $producer->send(true);
    }
}