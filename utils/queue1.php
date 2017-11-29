<?php
require __DIR__ . '/../init.inc.php';
$que = Queue::getRabbitMQInstance('/vhost_test', 'exchange_test', 'queue_test', 'route_test');
$que->push("route_test","qudongjie");