<?php 

include_once "classes/Stamp.php";

class Record 
{
    /**
     * Get the list of stamps 
     */
    public function getHeatStamps() {
        global $db;

        //get all collection table records
        $res = $db->query("SELECT * FROM collection");

        // translating from generic object to a Stamp object
        $stamps = [];
        foreach($res as $r) {
            $stamps[] = new Stamp($r->name, $r->description, $r->year, $r->width, $r->height, $r->quantity, $r->album, $r->image, $r->grade);
        }

        //return stamps array
        return $stamps;
    }

    /**
     * Find Stamp and Return ID and Quantity
     */
    public function findHeatStamp($nameVal, $yearVal, $widthVal, $heightVal, $albumVal, $gradeVal) {
        global $db;

        //find a record matching passed property values
        $res = $db->query("SELECT * FROM collection WHERE name='$nameVal' AND year='$yearVal' AND width='$widthVal' AND height='$heightVal' AND album='$albumVal' AND grade='$gradeVal'");
        
        $retVals[] = "";

        //if there are no rows in results, return 0, else return id and quantity on record
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
        
        //before adding stamp record, make sure we don't already have a record with the same property values
        $temp = $this->findHeatStamp($stamp->name, $stamp->year, $stamp->width, $stamp->height, $stamp->album, $stamp->grade);

        //if we find a stamp record that has matching values, don't add it to database instead increase quantity on record
        if($temp > 0){
            //get existing quantity amount and add one to it
            $tempQty = $temp[1] + $stamp->quantity;
  
            //update database with new quantity amount
            $db->query("UPDATE collection SET quantity = '$tempQty' WHERE id = '$temp[0]'");
        }
        else{
            //if we don't already have that stamp on file, go ahead and add it to the database
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
        //get stamp record id by matching stamp properties to database record
        $temp = $this->findHeatStamp($stamp['name'], $stamp['year'], $stamp['width'], $stamp['height'], $stamp['album'], $stamp['grade']);
        
        //remove record matching the found id
        $db->query("DELETE FROM collection WHERE id = '$temp[0]'");
    }

    /**
    * Subtract Stamp Quantity
    */
    public function subtractHeatStamp($stamp) {
        global $db;

        //get stamp record id by matching stamp properties to database record
        $temp = $this->findHeatStamp($stamp['name'], $stamp['year'], $stamp['width'], $stamp['height'], $stamp['album'], $stamp['grade']);
 
        //if we find a matching record with a quantity greater than 0
        if($temp[1] > 0){
            //now that we have record id and know that there is at least one stamp in our collection, subtract one to existing record quantity
            $tempQty = --$temp[1];

            //update the database with new quantity amount
            $db->query("UPDATE collection SET quantity = '$tempQty' WHERE id = '$temp[0]'");
        }
    }

    /**
    * Increment Stamp Quantity
    */
    public function incrementHeatStamp($stamp) {
        global $db;
        //get stamp record id by matching stamp properties to database record
        $temp = $this->findHeatStamp($stamp['name'], $stamp['year'], $stamp['width'], $stamp['height'], $stamp['album'], $stamp['grade']);

        //if we find a matching record
        if($temp > 0){
            //now that we have record id, add one to existing record quantity
            $tempQty = ++$temp[1];
  
            //write new quantity to database
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

        //return stamps array
        return $stamps;
    }

    /**
    * Count total Stamps
    */
    public function countHeatStamps() {
        global $db;

        $res = $db->query("SELECT count(1) as 'count' FROM collection");
        $totalCount = $res[0]->count;
        
        // return count
        return $totalCount;
    }
}