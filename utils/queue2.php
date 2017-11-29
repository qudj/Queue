<?php
define("__APPNAME__", "Csumer");

require __DIR__ . '/../init.inc.php';

$queue = Queue::getRabbitMQInstance('/vhost_test', 'exchange_test', 'queue_test', 'route_test');
$routingKeys = array();

$instanceList = array();

$options = array(
    'max_time_length' => 4000,
    'error_handler' => function ($key, $e) {
        error_log(date("Y-m-d H:i:s") . " ERROR: $key " . $e->getMessage());
    }   
);  

$queue->consume("queue_test", function($key, $data) use(&$instanceList, $routingKeys) {
   var_dump($data);
   Logger::ERR("KKK", "asdfasdfasdf");
}, $options);