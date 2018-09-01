<?php

class Album {
    public static $albumname = "Album";
    public static $collection = [];
    public static $season = "";

    public static function run() {
        // make all sheets have stamps
        foreach(Album::$collection as $sheet) {
            $sheet->name;
            $sheet->description;
            $sheet->year;
            $sheet->width;
            $sheet->height;
            $sheet->quantity;
            $sheet->album;
            $sheet->image;
            $sheet->grade;
        }
    }
}
