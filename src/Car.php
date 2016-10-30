<?php

namespace FastTcp;

class Car {
    private $brand;
    private $model;
    private $started = false;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function startEngine() {
        return $this->started = true;
    }

    public function isStarted() {
        return $this->started;
    }

    public function __toString() {
        return "$this->brand $this->model";
    }
}
