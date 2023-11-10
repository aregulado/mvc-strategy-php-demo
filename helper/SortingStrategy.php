<?php

interface SortingStrategy {
    public function sort($string);
}

class BubbleSort implements SortingStrategy {
    public function sort($string) {
        $converter = new ConvertArray();
        $numArray = $converter->convertStringToNumberArray($string);
        $sortedArray = $this->bubble_sort($numArray);

        return implode($converter->convertNumArrayToString($sortedArray));
    }

    function bubble_sort($array) {
        do {
            $swapped = false;
            for( $i = 0, $c = count( $array ) - 1; $i < $c; $i++ ) {
                if( $array[$i] > $array[$i + 1] ) {
                    list( $array[$i + 1], $array[$i] ) = array( $array[$i], $array[$i + 1] );
                    $swapped = true;
                }
            }
        } while($swapped);

        return $array;
    }
}

class QuickSort implements SortingStrategy {
    public function sort($string) {
        $converter = new ConvertArray();
        $numArray = $converter->convertStringToNumberArray($string);
        $sortedArray = $this->quick_sort($numArray);

        return implode($converter->convertNumArrayToString($sortedArray));
    }

    function quick_sort($my_array)
    {
        $loe = $gt = array();
        if(count($my_array) < 2) {
            return $my_array;
        }
        $pivot_key = key($my_array);
        $pivot = array_shift($my_array);
        foreach($my_array as $val) {
            if($val <= $pivot) {
                $loe[] = $val;
            } elseif ($val > $pivot) {
                $gt[] = $val;
            }
        }
        return array_merge($this->quick_sort($loe), array($pivot_key=>$pivot), $this->quick_sort($gt));
    }
}

class MergeSort implements SortingStrategy {
    public function sort($string) {
        $converter = new ConvertArray();
        $numArray = $converter->convertStringToNumberArray($string);
        $sortedArray = $this->merge_sort($numArray);

        return implode($converter->convertNumArrayToString($sortedArray));
    }

    function merge_sort($my_array){
        if(count($my_array) == 1 ) return $my_array;
        $mid = (int) abs(count($my_array) / 2);
        $left = array_slice($my_array, 0, $mid);
        $right = array_slice($my_array, $mid);
        $left = $this->merge_sort($left);
        $right = $this->merge_sort($right);
        return $this->merge($left, $right);
    }

    function merge($left, $right){
        $res = array();
        while (count($left) > 0 && count($right) > 0){
            if($left[0] > $right[0]){
                $res[] = $right[0];
                $right = array_slice($right , 1);
            }else{
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }
        while (count($left) > 0){
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
        while (count($right) > 0){
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }
        return $res;
    }
}

class ConvertArray {
    function convertStringToNumberArray($string) {
        $tempArray = array();
        foreach(str_split($string) as $value) {
            array_push($tempArray, $this->alpha2num($value));
        }

        return $tempArray;
    }

    function convertNumArrayToString($array) {
        $tempArray = array();
        foreach($array as $value) {
            array_push($tempArray, $this->num2alpha($value));
        }

        return $tempArray;
    }

    /**
    * Converts an integer into the alphabet base (A-Z).
    */
    function num2alpha($n) {
        $r = '';
        for ($i = 1; $n >= 0 && $i < 10; $i++) {
            $r = chr(97 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
            $n -= pow(26, $i);
        }
        return $r;
    }

    /**
    * Converts an alphabetic string into an integer.
    */
    function alpha2num($a) {
        $r = 0;
        $l = strlen($a);
        for ($i = 0; $i < $l; $i++) {
            $r += pow(26, $i) * (ord($a[$l - $i - 1]) - 96);
        }
        return $r - 1;
    }
}
