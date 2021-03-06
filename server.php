<?php

use Workerman\Worker;

require_once __DIR__ . '/vendor/autoload.php';

// Create a Websocket server
$ws_worker = new Worker('websocket://cashcall.ru:8080');

// 4 processes
$ws_worker->count = 4;


// Emitted when new connection come
$ws_worker->onConnect = function ($connection) {
    var_dump($connection);
    echo "New connection\n";
};

// Emitted when data received
$ws_worker->onMessage = function ($connection, $data) {

    $connection->send('Hello ' . $data);

};

// Emitted when connection closed
$ws_worker->onClose = function ($connection) {
    echo "Connection closed\n";
};

// Run worker
Worker::runAll();