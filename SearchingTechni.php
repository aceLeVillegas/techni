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

   // $narrorTable = $narrorDown; 

    $artWork = 3;

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