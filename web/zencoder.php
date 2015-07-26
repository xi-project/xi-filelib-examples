<?php

use Xi\Filelib\File\FileRepository;

if (is_file(__DIR__ . '/../filelib-example.json')) {
    unlink(__DIR__ . '/../filelib-example.json');
}


require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../async-common.php';
require_once __DIR__ . '/../zencoder-common.php';

$path = realpath(__DIR__ . '/../hauska-joonas.mp4');

$filelib->getFileRepository()->setExecutionStrategy(
    \Xi\Filelib\Asynchrony\FileRepository::COMMAND_AFTERUPLOAD,
    \Xi\Filelib\Asynchrony\ExecutionStrategies::STRATEGY_ASYNC_PEKKIS_QUEUE
);

$file = $filelib->uploadFile($path);

header('Location: zencoder-view-video.php?id=' . $file->getId());

