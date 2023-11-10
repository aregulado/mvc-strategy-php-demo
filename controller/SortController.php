<?php

include 'helper/SortingContext.php';

class SortController
{
    public function view()
    {
        $algorithms = Algorithm::fetchAllData();

        include 'view/home.php';
    }

    public function sort($params)
    {
        // params first value is the method, 2nd value is the string input
        $sortMethod = new SortingContext($this->getSortingMethod($params[1]));
        $result = $sortMethod->sortString($params[2]);

        print $result;
    }

    public function getSortingMethod($methodId)
    {
        switch ($methodId) {
            case 1:
                return new BubbleSort();
            case 2:
                return new QuickSort();
            case 3:
                return new MergeSort();
            default:
                throw new \Exception("Unknown Method");
        }
    }
}