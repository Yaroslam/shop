<?php

namespace App\Logging\Telegram;
use Monolog\Logger;


class TelegramLoggerFabric
{
    public function __invoke(array $config){
        $logger =  new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler($config));
        return $logger;
    }



}
