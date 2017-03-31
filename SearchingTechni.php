<?php



    $servername = getenv('IP');
    $dbPort = 3306;
    $database = "Techni"; 
    $username = getenv('C9_USER');
    $password = "";
    $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
// Books
// Prints
// Lithographs
// Original Artwork
// Gift Cards
// Photography 
// Sculpture
// Mixed Media 

<<<<<<< HEAD
   // $narrorTable = $narrorDown; 
=======
    $narrowTable = $narrowDown; 
>>>>>>> a139bdc2d00b20f095735d8ae26dd3ed5123511c

    $artWork = 3;

<<<<<<< HEAD
    //function findTypeTable($artWork, $dbConn){
        
    $narrorDown = "select productName, typeName 
    from `Product` 
    join `Product Type` 
    on `Product Type`.productTypeID = `Product`.productTypeID 
    where `Product`.productTypeID = '" . $artWork ."' order by `Product`.productName"; 
                        
        
    $narState = $dbConn->prepare($narrorDown);
    $narState->execute();
    
    
        
    while ($na = $narState->fetch()){
       
        echo "<br/><br/> Product Name: ".$na['productName'] . "  Product Type: " . $na['typeName'] . "<br/>"; 

    }
    
    if(isset($_POST["artist"])){
        
        
    }
    if(isset($_POST["style"])){
        
        
    }
    if(isset($_POST["range"])){
        
        
    }
                
=======
    function findTypeTable($artWork, $dbConn){
        
        $artwork = 3;
        $artwork = intval($artwork); //must explicitly typecast to int to use number variable in SQL statement
        
        //for string variables do this:
        // $type     = 'testing';
        // $type     = mysql_real_escape_string($type);
        
        $narrowDown = "SELECT Product.productName, `Product Type`.typeName 
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.productTypeID = $artwork
                       ORDER BY `Product`.productName";

        // returns the new narrowed down list of art
        return $narrowDown; 
        
    }
    
    
    $narrow = findTypeTable($artWork, $dbConn);
    $statement = $dbConn->prepare($narrow);
    $statement->execute();
    
    
    echo "<table>";
            echo "<tr>" . "<td>" . "TYPE" . "</td>" . "<td>" . "PRODUCT" . "</td>" . "</tr>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "<tr>";
                    echo "<td>" . $row["typeName"] . "</td>";
                    echo "<td>" . $row["productName"] . "</td>";
                echo "</tr>";
            }
    echo "</table>";
    
>>>>>>> a139bdc2d00b20f095735d8ae26dd3ed5123511c
    // function findYear($narrorTable){
        
    //     global $narrorTable; 
        
    // }
    
    // function findArtist($narrorTable){
        
    //     global $narrorTable; 
    // }
    
    // function findStyle($narrorTable){
        
    //     global $narrorTable; 
    // }
    // function findPrices($narrorTable){
        
    //     global $narrorTable; 
    // }

?>