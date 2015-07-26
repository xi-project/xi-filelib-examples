<?php

require_once __DIR__ . '/constants.php';

use Pekkis\Queue\Adapter\PhpAMQPAdapter;

use Xi\Filelib\Asynchrony\Asynchrony;
use Xi\Filelib\Asynchrony\ExecutionStrategy\PekkisQueueExecutionStrategy;

$asynchrony = new Asynchrony($filelib);

$adapter = new PhpAMQPAdapter(
    RABBITMQ_HOST,
    5672,
    RABBITMQ_USERNAME,
    RABBITMQ_PASSWORD,
    RABBITMQ_VHOST,
    'filelib_example',
    'filelib_example_queue'
);

$pekkisQueueStrategy = new PekkisQueueExecutionStrategy(
    $adapter,
    $filelib
);

$asynchrony->addStrategy($pekkisQueueStrategy);
