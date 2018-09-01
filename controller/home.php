<?php 
include_once "classes/Album.php";
include_once "classes/Stamp.php";
include_once "model/records.php";

class Home 
{
    /**
     * index action
     */
    public function index() {
        // create the model object


        $recordModel = new Record();

        // get info for the view
        $records = $recordModel->getRecords();

        $record2Model = new Record();

        // get info for the view
        $records2 = $record2Model->getHeatStamps();

        //get info for the view
        $welcome = "Welcome";
        $records3 = array();

        $title = "Home";
        // include the view
        include "view/home.php";
    } 

    /**
     * submit action
     */
    public function submit() {
        $record2Model = new Record();

        // get info for the carousel in view
        $records2 = $record2Model->getHeatStamps();

        // get link variables to display in main div area;
        $name = $_GET['name'];
        $description = $_GET['description'];
        $year = $_GET['year'];
        $width = $_GET['width'];
        $height = $_GET['height'];
        $quantity = $_GET['quantity'];
        $album = $_GET['album'];
        $image = $_GET['image'];
        $grade = $_GET['grade'];
        

        $enlarge['name'] = $name;
        $enlarge['description'] = $description;
        $enlarge['year'] = $year;
        $enlarge['width'] = $width;
        $enlarge['height'] = $height;
        $enlarge['quantity'] = $quantity;
        $enlarge['album'] = $album;
        $enlarge['image'] = $image;
        $enlarge['grade'] = $grade;
        
        // get record data to display in main div area after user clicks on carousel link
        $records3 = $enlarge;
        
        include "view/home.php";
        
    }
}
