<?php

namespace App\Http\Controllers;

use App\Services\BubbleSortInterface;
use Psr\Log\LoggerInterface;

class BubbleSortController
{
    public function __construct
    (
        private LoggerInterface $logger,
        private BubbleSortInterface $bubbleSort
    )
    {
    }

    public function list()
    {
//        $log = new Logger('vk_logger');
//        $log->pushHandler(new StreamHandler('log/my.log', Logger::WARNING));

        try {
            $inputArray = [2,7,34,3,6,12,5,99,67,34,56,4,1];

            $timeStart = time();

            $sortedArray = $this->bubbleSort->sort($inputArray);

            $timeEnd = time();
            $memoryUsage = memory_get_usage();

            $this->logger->debug('Время выполнения: '. $timeEnd -$timeStart);
            $this->logger->debug('Потребленная память: '. memory_get_usage());

        }catch (Throwable $exception)
        {
            $this->logger-> error('Ошибка выполнения: '.$exception->getMessage());
        }
    }
}
