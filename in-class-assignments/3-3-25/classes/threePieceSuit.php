<?php

namespace _3_3_25\classes;
class threePieceSuit {

    //properties, with member visibility
    public $name;
    public $fabric;

    //constructor
    public function __construct($name, $fabric) {
        $this->name = $name;
        $this->price = $price;
    }

    //method for encoding to java
    public function toJson(): string {
        return json_encode([
            "name" => $this->name,
            "price" => $this->price,
        ], JSON_PRETTY_PRINT);
    }

}
