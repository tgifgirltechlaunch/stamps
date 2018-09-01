<?php

// include classes
include_once "classes/Album.php";
include_once "classes/Stamp.php";
include_once "model/records.php";

class Heat 
{
    public function index() {
        // include the model
        $recordModel = new Record();

        // create the stamp album
        Album::$collection = $recordModel->getHeatStamps();
        Album::$season = "2018";

        // start game
        Album::run();

        // sort Stamps by year
        usort(Album::$collection, function($a, $b) {
            return $a->year < $b->year;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function sortDuplicatesDesc() {
        // include the model
        $record5Model = new Record();
        Album::$season = "2018";

        // create the stamp album
        Album::$collection = $record5Model->getHeatStamps();
        // sort Stamps by quantity
        usort(Album::$collection, function($a, $b) {
            // print_r($a);
            // exit;
            
            return $a->quantity < $b->quantity;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function sortDuplicatesAsc() {
        // include the model
        $record6Model = new Record();
        Album::$season = "2018";

        // create the stamp album
        Album::$collection = $record6Model->getHeatStamps();
        // sort Stamps by quantity
        usort(Album::$collection, function($a, $b) {
            // print_r($a);
            // exit;
            
            return $a->quantity > $b->quantity;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function sortYearDesc() {
        // include the model
        $record7Model = new Record();
        Album::$season = "2018";

        // create the stamp album
        Album::$collection = $record7Model->getHeatStamps();
        // sort Stamps by quantity
        usort(Album::$collection, function($a, $b) {
            // print_r($a);
            // exit;
            
            return $a->year < $b->year;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function sortYearAsc() {
        // include the model
        $record8Model = new Record();
        Album::$season = "2018";

        // create the stamp album
        Album::$collection = $record8Model->getHeatStamps();
        // sort Stamps by quantity
        usort(Album::$collection, function($a, $b) {
            // print_r($a);
            // exit;
            
            return $a->year > $b->year;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function sortAlbumTrue() {
        // include the model
        $record9Model = new Record();
        Album::$season = "2018";

        // create the stamp album
        Album::$collection = $record9Model->getHeatStamps();
        // sort Stamps by quantity
        usort(Album::$collection, function($a) {
            // print_r($a);
            // exit;
            
            return $a->album == 0;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function sortAlbumFalse() {
        // include the model
        $record10Model = new Record();
        Album::$season = "2018";

        // create the stamp album
        Album::$collection = $record10Model->getHeatStamps();
        // sort Stamps by quantity
        usort(Album::$collection, function($a) {
            // print_r($a);
            // exit;
            
            return $a->album == 1;
        });

        // include the view
        $title = "Collection";
        include "view/heat.php";
    }

    public function add() {
        // include the view
        $title = "Add Stamp";
        include "view/heat-add.php";
    }

    public function search() {
        // include the view
        $title = "Search for Stamp";
        include "view/heat-search.php";
    }

    public function delete() {
        $stamp['name'] = $_GET['name'];
        $stamp['year'] = $_GET['year'];
        $stamp['width'] = $_GET['width'];
        $stamp['height'] = $_GET['height'];
        $stamp['quantity'] = $_GET['quantity'];
        $stamp['album'] = $_GET['album'];
        $stamp['grade'] = $_GET['grade'];
        
        // delete the stamp
        $record3Model = new Record();
        $record3Model->deleteHeatStamp($stamp);

        // redirect to the list of stamps
        header('Location: index.php?page=heat');
    }

    public function subtract() {
        $stamp['name'] = $_GET['name'];
        $stamp['year'] = $_GET['year'];
        $stamp['width'] = $_GET['width'];
        $stamp['height'] = $_GET['height'];
        $stamp['quantity'] = $_GET['quantity'];
        $stamp['album'] = $_GET['album'];
        $stamp['grade'] = $_GET['grade'];

        // delete the stamp
        $record4Model = new Record();
        $record4Model->subtractHeatStamp($stamp);

        // redirect to the list of stamps
        header('Location: index.php?page=heat');
    }

    public function increment() {
        $stamp['name'] = $_GET['name'];
        $stamp['year'] = $_GET['year'];
        $stamp['width'] = $_GET['width'];
        $stamp['height'] = $_GET['height'];
        $stamp['quantity'] = $_GET['quantity'];
        $stamp['album'] = $_GET['album'];
        $stamp['grade'] = $_GET['grade'];

        // delete the stamp
        $record4Model = new Record();
        $record4Model->incrementHeatStamp($stamp);

        // redirect to the list of stamps
        header('Location: index.php?page=heat');
    }

    public function submit() {
        // get params from the view
        if (!empty($_POST['album'])) {   
            $albumVal = 1;
        }else{ $albumVal = 0; }
        $name = $_POST['name'];
        $description = $_POST['description'];
        $year = $_POST['year'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        $quantity = $_POST['quantity'];
        $album = $albumVal;
        $image = $_POST['image'];
        $grade = $_POST['grade'];

        // create new Stamp
        $stamp = new Stamp(ucfirst ($name), $description, $year, $width, $height, $quantity, $album, $image, ucfirst ($grade));
        
        // save the stamp
        $record2Model = new Record();
        $record2Model->addHeatStamp($stamp); 

        // redirect to the list of stamps
        header('Location: index.php?page=heat');
    }

    
    public function submitSearch() {
        if(isset($_POST['term'])){
            $term = $_POST['term'];
        }
        if(isset($_POST['field'])){
            $field = $_POST['field'];
        }

        // save the stamp
        $record11Model = new Record();
        Album::$collection = $record11Model->searchHeatStamp($field, $term);
        Album::$season = "2018";

        // include the view
        $title = "Search Results";
        include "view/heat.php";
    }
}