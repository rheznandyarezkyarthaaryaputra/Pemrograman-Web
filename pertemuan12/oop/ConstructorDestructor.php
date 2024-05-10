<?php
// no 1.7
class Car{
    private $brand;
    public function __construct($brand){
        $this->brand=$brand;
    }
    public function getBrand(){
        return $this->brand;
    }
    public function __destruct(){
        echo "The car is destroyed.<br>";
    }
}
$car= new Car("Toyota");
echo "Brand: ". $car->getBrand() ."<br>";