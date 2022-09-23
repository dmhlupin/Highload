<?php

namespace App\Services;

class BubbleSort implements BubbleSortInterface
{

    public function sort(array $elements): array
    {
        $sortedArray = $elements; //чтобы не портить исходный массив
        $count = count($sortedArray);
        if($count > 1)
        {
            for ($i=0; $i < $count; $i++) {
                for ($j=0; $j < $count-$i-1; $j++) {
                    if ($sortedArray[$j] > $sortedArray[($j + 1)]) {
                        $temp = $sortedArray[$j];
                        $sortedArray[$j] = $sortedArray[$j+1];
                        $sortedArray[$j+1] = $temp;
                    }
                }

            }
        }
        return $sortedArray;
    }
}
