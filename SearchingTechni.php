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

    $narrorTable = $narrorDown; 

    $artWork = $_GET["artWork"];

    function findTypeTable($artWork, $dbConn){
        
        $narrorDown = "SELECT ProductType.productType, Product.productName 
                            FROM ProductType 
                            RIGHT JOIN Product
                            ON $artWork = Product.productTypeId 
                            ORDER BY Product.productName"; 
                            
                            
        
        
        // returns the new narrored list of 
        return $narrorDown; 
        
    }
    
    
    $narror = findTypeTable($artWork, $dbConn);
    $narState = $dbConn->prepare($narror);
    $narState->execute();
    
    
    echo "<div style = \" width: 500px; height: 600;\">"; 
                echo "<table class= \"chart\">
                        <tr class = \"header\">
                        <th colspan = \"3\" class = \"header\">Types of Products</td>
                        </tr>
                        <tr class = \"header\">
                            <th>Product Type</th>
                            <th>Number Of Products</th>
                        </tr>"; 
                
                // Don't return the indexed values, just the associative
                while ($narrorw = $narState->fetch(PDO::FETCH_ASSOC)){
                    // var_dump($whereInRow); 
                    echo "<tr  colspan = \"2\">";
                    
                    echo "<td>" .   $narror['productType'] . "</td>" .
                    "<td>" .  $narror['productName '] . "</td>";
                        
                    echo "</tr>"; 
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

    

/*
Demo of how to search 

$whereSql = "SELECT ProductType.productType, COUNT(Product.productTypeId) AS 'numOfProducts' 
                            FROM Product
                            LEFT JOIN ProductType
                            ON ProductType.productTypeId = Product.productTypeId 
                            GROUP BY ProductType.productType";
                            
        
                echo "<br /><br />Filtered SQL: $whereSql<br /><br />";
                
                // The prepare caches the SQL statement for N number of parameters imploded above
                $whereStmt = $dbConn->prepare($whereSql);
                
                // Execute with the parameters. An interesting addition to this example: what 
                // about if you are filtering (executing) on multiple parameters and you have 
                // an IN clause??? Try it out!
                $whereStmt->execute();
                
                echo "<div style = \" width: 500px; height: 600;\">"; 
                echo "<table class= \"chart\">
                        <tr class = \"header\">
                        <th colspan = \"3\" class = \"header\">Types of Products</td>
                        </tr>
                        <tr class = \"header\">
                            <th>Product Type</th>
                            <th>Number Of Products</th>
                        </tr>"; 
                
                // Don't return the indexed values, just the associative
                while ($whereRow = $whereStmt->fetch(PDO::FETCH_ASSOC)){
                    // var_dump($whereInRow); 
                    echo "<tr  colspan = \"2\">";
                    
                    echo "<td>" .  $whereRow['productType'] . "</td>" .
                    "<td>" . $whereRow['numOfProducts'] . "</td>";
                        
                    echo "</tr>"; 
                }
                
                echo "</table></div>"; 
            }// end of countProducts

*/

?>