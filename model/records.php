<?php 

include_once "classes/Stamp.php";

class Record 
{
    /**
     * Get the list of names
     */
    public function getRecords() {
        global $db;
        $res = $db->query("SELECT name FROM collection");
        // print_r($res);
        // exit;

        // translating from generic object to a Collection object
        $names = [];

        foreach ($res as $obj)
        {
            // Here you can access to every object value in the way that you want
            $names[] = $obj->name;
        }

        return $names; 
    }

    /**
     * Get the list of stamps 
     */
    public function getHeatStamps() {
        
        global $db;
        $res = $db->query("SELECT * FROM collection");

        // translating from generic object to a Stamp object
        $stamps = [];
        foreach($res as $r) {
            $stamps[] = new Stamp($r->name, $r->description, $r->year, $r->width, $r->height, $r->quantity, $r->album, $r->image, $r->grade);
        }

        return $stamps;
    }

    /**
     * Find Stamp and Return ID and Quantity
     */
    public function findHeatStamp($nameVal, $yearVal, $widthVal, $heightVal, $albumVal, $gradeVal) {
        global $db;
        $res = $db->query("SELECT * FROM collection WHERE name='$nameVal' AND year='$yearVal' AND width='$widthVal' AND height='$heightVal' AND album='$albumVal' AND grade='$gradeVal'");
        
        $retVals[] = "";

        if(empty($res)){
            return 0;
        }
        else{
            $retVals[0] = $res[0]->id;
            $retVals[1] = $res[0]->quantity;

            return $retVals;
        }
    }

    /**
     * Add New Stamp
     */
    public function addHeatStamp($stamp) {
        global $db;
        
        $temp = $this->findHeatStamp($stamp->name, $stamp->year, $stamp->width, $stamp->height, $stamp->album, $stamp->grade);

        if($temp > 0){
            $tempQty = $temp[1] + $stamp->quantity;
  
            $db->query("UPDATE collection SET quantity = '$tempQty' WHERE id = '$temp[0]'");
        }
        else{
            $db->query("
            INSERT INTO collection (name, description, year, width, height, quantity, album, image, grade) 
            VALUES ('$stamp->name', '$stamp->description', '$stamp->year', '$stamp->width', '$stamp->height', '$stamp->quantity', '$stamp->album', '". $stamp->image ."', '$stamp->grade')");
        }
    }

     /**
     * Delete Stamp Record 
     */
    public function deleteHeatStamp($stamp) {
        global $db;
        $temp = $this->findHeatStamp($stamp['name'], $stamp['year'], $stamp['width'], $stamp['height'], $stamp['album'], $stamp['grade']);
        
        $db->query("DELETE FROM collection WHERE id = '$temp[0]'");
    }

    /**
    * Subtract Stamp Quantity
    */
    public function subtractHeatStamp($stamp) {
        global $db;
        
        $temp = $this->findHeatStamp($stamp['name'], $stamp['year'], $stamp['width'], $stamp['height'], $stamp['album'], $stamp['grade']);
 
        if($temp[1] > 0){
            $tempQty = --$temp[1];

            $db->query("UPDATE collection SET quantity = '$tempQty' WHERE id = '$temp[0]'");
        }
    }

    /**
    * Increment Stamp Quantity
    */
    public function incrementHeatStamp($stamp) {
        global $db;
        
        $temp = $this->findHeatStamp($stamp['name'], $stamp['year'], $stamp['width'], $stamp['height'], $stamp['album'], $stamp['grade']);

        if($temp > 0){
            $tempQty = ++$temp[1];
  
            $db->query("UPDATE collection SET quantity = '$tempQty' WHERE id = '$temp[0]'");
        }
    }

    /**
    * Search for Stamp
    */
    public function searchHeatStamp($field, $term) {
        global $db;
        
        $res = $db->query("SELECT * FROM collection WHERE $field = '$term'");

        // translating from generic object to a Stamp object
        $stamps = [];
        foreach($res as $r) {
            $stamps[] = new Stamp($r->name, $r->description, $r->year, $r->width, $r->height, $r->quantity, $r->album, $r->image, $r->grade);
        }

        return $stamps;
    }
}