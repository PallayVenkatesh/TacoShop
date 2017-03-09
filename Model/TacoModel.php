 <?php

require ("Entities/TacoEntity.php");

//Contains database related code for the Coffee page.
class TacoModel {

    //Get all coffee types from the database and return them in an array.
    function GetTacoTypes() {
        require 'Credentials.php';

        //Open connection and Select database.   
        $con= mysqli_connect($host, $user, $passwd,$database) or die(mysql_error());
        mysqli_select_db($con, $database);
        $result = mysqli_query($con,"SELECT DISTINCT type FROM coffee") or die(mysql_error());
        $types = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysqli_close($con);
        return $types;
    }

    //Get coffeeEntity objects from the database and return them in an array.
    function GetTacoByType($type) {
        require 'Credentials.php';

        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $passwd,$database) or die(mysql_error);
        mysqli_select_db($con, $database);
        $query = "SELECT * FROM coffee WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $tacoArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $taco = new TacoEntity(-1, $name, $type, $price, $roast, $country, $image, $review);
            array_push($tacoArray, $taco);
        }
        //Close connection and return result
        mysqli_close($con);
        return $tacoArray;
    }

}

?>
