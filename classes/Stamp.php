<?php

class Stamp 
{
    public $name = "";
    public $description = "";
    public $year = 0;
    public $width = 0.00;
    public $height = 0.00;
    public $quantity = 0;
    public $album = 0;
    public $image = "";
    public $grade = "";

    //create stamp object
    public function __construct ($name, $description, $year, $width, $height, $quantity, $album, $image, $grade) {
        $this->name = $name;
        $this->description = $description;
        $this->year = $year;
        $this->width = $width;
        $this->height = $height;
        $this->quantity = $quantity;
        $this->album = $album;
        $this->image = $image;
        $this->grade = $grade;
    }

    public function __toString() {
        return "collection {$this->name} has {$this->quantity} duplicate stamps.";
    }
}
