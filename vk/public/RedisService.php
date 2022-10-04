<?php

class RedisService
{
    public function cache()
    {
        $redis = new Redis();
        $redis->connect('redis');

        $redis->expireat('languages', time() + 60);
        $redis->rpush('languages', 'french ');
        $redis->rpush('languages', 'arabic ');
        $redis->lpush('languages', 'english ');
        $redis->lpush('languages', 'swedish ');


        echo(date('l jS \of F Y h:i:s A').'  Redis Cache Start'.'<br/>');
        echo('Длина списка: '.$redis->lLen('languages').'<br/>');
        echo('Весь список: '. implode($redis->lRange('languages', 0, -1)).'<br>');
        echo('Redis Cache End.');
    }
}
