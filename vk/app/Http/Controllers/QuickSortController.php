<?php

namespace App\Http\Controllers;

use App\Services\QuickSortInterface;
use App\Services\SortInterface;
use Illuminate\Routing\Controller as BaseController;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Throwable;

class QuickSortController extends BaseController
{
    public function __construct(
        private LoggerInterface $logger,
        private QuickSortInterface $quickSort
    ){

    }
    public function list()
    {
//        $log = new Logger('vk_logger');
//        $log->pushHandler(new StreamHandler('log/my.log', Logger::WARNING));

        try {
            $inputArray = [2,7,34,3,6,12,5,99,67,34,56,4,1];

            $timeStart = time();

            $sortedArray = $this->quickSort->sort($inputArray);

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
