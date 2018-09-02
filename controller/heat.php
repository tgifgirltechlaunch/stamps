<?php
use Halfpastfour\PHPChartJS\Chart\Bar;

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
        
        Album::$total = $recordModel->countHeatStamps();

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
        //checl that term and field have been set
        if(isset($_POST['term'])){
            $term = $_POST['term'];
        }
        if(isset($_POST['field'])){
            $field = $_POST['field'];
        }

        // search for the stamps by column 'field' using value 'term'
        $record11Model = new Record();
        Album::$collection = $record11Model->searchHeatStamp($field, $term);

        

        // include the view
        $title = "Search Results";
        include "view/heat.php";
    }

    public function countStamps() {
        //count the stamps
        
    }

    public function report() {
        // get stamp album
        $recordModel = new Record();

        // create the stamp album
        $albums = $collection = $recordModel->getHeatStamps();

        $years=[];
        $quantity=[];
        $album=[];

        //get album collection info into an array
        foreach($albums as $a){
            $years[] = $a->year;
            $quantity[] = $a->quantity;
            $album[] = $a->album;
        }

        //create a new bar chart
        $bar = new Bar();
        $bar->setId( "myBar" );

        // Set labels
        $bar->labels()->exchangeArray( $years );

        // Add apples
        $qty = $bar->createDataSet();
        $qty->setLabel( "Duplicates" )
        ->setBackgroundColor( "rgba( 0, 0, 0, .5 )" )
        ->data()->exchangeArray( $quantity );
        $bar->addDataSet( $qty );

        // Add oranges as well
        $al = $bar->createDataSet();
        $al->setLabel( "Album Glued" )
        ->setBackgroundColor( "rgba( 0, 0, 0, .1 )" )
        ->data()->exchangeArray( $album );
        $bar->addDataSet( $al );
        
        // Add some extra data
        // $al->data()->append( 10 );

        // $bar->addDataSet( $al );
       
        // Render the chart
        $chart = $bar->render();

        //include the view
        include "view/heat-report.php";
    }
}