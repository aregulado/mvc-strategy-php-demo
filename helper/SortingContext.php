<?php

include 'SortingStrategy.php';

class SortingContext {
    private $strategy;
    
    public function __construct(SortingStrategy $strategy) {
        $this->strategy = $strategy;
    }
    
    public function sortString($string) {
        return $this->strategy->sort($string);
    }
}