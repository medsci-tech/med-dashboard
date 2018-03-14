<?php

namespace App\Http\Controllers\Kafka;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Enqueue\RdKafka\RdKafkaConnectionFactory;


class TestController extends Controller
{
    public function producer()
    {
//        // connects to localhost:9092
//        $connectionFactory = new RdKafkaConnectionFactory();
//
//        // same as above
//        $connectionFactory = new RdKafkaConnectionFactory('kafka:');
//
//        // same as above
//        $connectionFactory = new RdKafkaConnectionFactory([]);
//        // connect to Kafka broker at example.com:1000 plus custom options
        $connectionFactory = new RdKafkaConnectionFactory([
            'global' => [
                'group.id' => 'test',
                'metadata.broker.list' => '172.21.0.13:9092',
                'enable.auto.commit' => 'false',
            ],
            'topic' => [
                'auto.offset.reset' => 'doc_ant_wechat',
            ],
        ]);

        $psrContext = $connectionFactory->createContext();

//        // if you have enqueue/enqueue library installed you can use a function from there to create the context
//        $psrContext = \Enqueue\dsn_to_context('kafka:');

        $message = $psrContext->createMessage('Hello world!');
        $fooTopic = $psrContext->createTopic('doc_ant_wechat');

        $result = $psrContext->createProducer()->send($fooTopic, $message);
        dd($result);
    }

    public function consumer()
    {
        $connectionFactory = new RdKafkaConnectionFactory([
            'global' => [
                'group.id' => 'test',
                'metadata.broker.list' => '172.21.0.13:9092',
                'enable.auto.commit' => 'false',
            ],
            'topic' => [
               'doc_ant_wechat'
            ],
        ]);

        $psrContext = $connectionFactory->createContext();
        $fooQueue = $psrContext->createQueue('foo');

        $consumer = $psrContext->createConsumer($fooQueue);

// Enable async commit to gain better performance.
//$consumer->setCommitAsync(true);

        $message = $consumer->receive();

// process a message

        $consumer->acknowledge($message);
// $consumer->reject($message);
    }
}
