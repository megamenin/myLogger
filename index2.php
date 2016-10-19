<?php

require 'vendor/autoload.php';

use Psr\Log\LogLevel;
use Anohov\Log\AnohovLogger as Logger;
use Anohov\Log\AnohovLoggerTarget as LoggerTarget;

$message = 'some message';

$context = array(
    'str' => 'strval',
    'num' => 123,
    'array' => array(1, 4, 'str'),
    'exc' => new \Exception('excsept'),
);

$setting1 = array(
    'LOG_TARGET' => LoggerTarget::FILE,
    'LOG_PATH' => __DIR__,
    'LOG_FILENAME' => 'file.log',
);

$setting2 = array(
    'LOG_TARGET' => LoggerTarget::DATABASE,
    'LOG_HOST' => 'localhost',
    'LOG_USERNAME' => 'root',
    'LOG_USERPASSWORD' => 'qwerty123',
    'LOG_DBNAME' => 'mytest',
    'LOG_TABLENAME' => 'logs',
);

$setting3 = array(
    'LOG_TARGET' => LoggerTarget::STDOUT,
);

Logger::setLogSetting($setting1);
Logger::$logger->log(LogLevel::ALERT, $message, $context);

Logger::setLogSetting($setting2);
Logger::$logger->log(LogLevel::NOTICE, $message, $context);

Logger::setLogSetting($setting3);
Logger::$logger->log(LogLevel::ERROR, $message, $context);
