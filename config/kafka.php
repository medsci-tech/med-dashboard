<?php

return [
    'host' => env('KAFKA_HOST'),
    'port' => env('KAFKA_PORT'),
    'produce_interval' => 500,
    'refresh_interval_ms' => 10000,
    'topic' => env('KAFKA_TOPIC')
];