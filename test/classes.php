<?php 
    class Testclass{
        private $brand;
        private $color;

        public function __construct($brand,$color){
            $this->brand = $brand;
            $this->model = $color;

        }

        public function engine(){
            return "this cars brand is {$this->brand} and model is {$this->model}";
        }
    }

    $car = new Testclass("benz","red");

    print($car->engine());
    
?>