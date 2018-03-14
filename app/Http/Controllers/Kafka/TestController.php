<?php

namespace App\Http\Controllers\Kafka;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Enqueue\RdKafka\RdKafkaConnectionFactory;


class TestController extends Controller
{
    public function producer()
    {
        $rk = new RdKafka\Producer();
        $rk->setLogLevel(LOG_DEBUG);
        $rk->addBrokers("172.21.0.13");

        $topic = $rk->newTopic("doc_ant_web");

        for ($i = 0; $i < 10; $i++) {
            $topic->produce(RD_KAFKA_PARTITION_UA, 0, "Message $i");
        }
    }

    public function consumer()
    {
        $rk = new RdKafka\Consumer();
        $rk->setLogLevel(LOG_DEBUG);
        $rk->addBrokers("172.21.0.13");

        $topic = $rk->newTopic("doc_ant_web");

        $topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

        while (true) {
            $msg = $topic->consume(0, 1000);
            if ($msg->err) {
                echo $msg->errstr(), "\n";
                break;
            } else {
                echo $msg->payload, "\n";
            }
        }
    }
}
