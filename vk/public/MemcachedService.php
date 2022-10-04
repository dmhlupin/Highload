<?php

class MemcachedService
{
    public function cache()
    {
        $memcached = new Memcached();
        $memcached->addServer('memcached', 11211);
        $values = [                                                 //Массив с ключами
            'startString' => '--- Memcached Cache Start at '.date('l jS \of F Y h:i:s A'). '--- <br> ',
            'message' => 'Hello, cached World!',
            'endString' => '--- Memcached Cache End --- <br>'
        ];
        $memcached->setMulti($values, time() + 60); // множественное добавление в кэш

        $result = $memcached->getMulti(array_keys($values)); // извлечение нескольких значений из кэша
        echo('<pre>');
        print_r($result);
        echo('</pre>');
    }

}
