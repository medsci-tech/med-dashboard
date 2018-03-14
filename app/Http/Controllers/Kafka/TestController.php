<?php

namespace App\Http\Controllers\Kafka;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function producer()
    {
        $produce = \Kafka\Produce::getInstance('10.13.4.159:9192', 3000);

        $produce->setRequireAck(-1);
        $produce->setMessages('test', 0, array('test1111111'));
        $produce->setMessages('doc_ant_wechat', 0, array('test1111111'));
        $produce->setMessages('doc_ant_web', 2, array('test1111111'));
        $result = $produce->send();
        var_dump($result);
    }

    public function consumer()
    {
        $consumer = \Kafka\Consumer::getInstance('10.13.4.159:9192');

        $consumer->setGroup('test');
        $consumer->setPartition('doc_ant_wechat', 0);
        $consumer->setPartition('doc_ant_web', 2, 10);
        $result = $consumer->fetch();
        foreach ($result as $topicName => $topic) {
            foreach ($topic as $partId => $partition) {
                var_dump($partition->getHighOffset());
                foreach ($partition as $message) {
                    var_dump((string)$message);
                }
            }
        }
    }
}
