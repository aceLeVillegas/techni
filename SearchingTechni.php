<!DOCTYPE html>
<html>

<head>
    <title>Techni</title>
     <link href="css/styles.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        
    </style>
</head>

<body>
    
    <!-- This is the search bar on top of the page -->
    <div id="topDiv">
        <div style="margin:0px padding:0px">
            <h1>Techni - The Online Art Gallery</h1>
        </div>
    </div>
    
    <!-- This will be the bar with the categories -->
    <div class = "categories">
        <ul class="menu">
            <li><a class="none" href="mainPage.php">Main Page</a></li>
            <li><a class="visited" href="painting.php?artWork=1">Painting</a></li>
            <li><a class="none" href="sculpture.php?artWork=2">Sculptures</a></li>
            <li><a class="none" href="photography.php?artWork=3">Photography</a></li>
            <li><a class="none" href="book.php?artWork=6">Books</a></li>
            <li><a class="none" href="mixed.php?artWork=5">Mixed Media</a></li>         
        </ul>
    </div>
    
    <!-- This is the main gallery -->
    <div id="content">
      
      <!-- Filters -->
      <div id="filters">
           <h3> These Are the Results: </h3>
           <form class="info" action="SearchingTechni.php" method="post" name="data">


<?php



    $servername = getenv('IP');
    $dbPort = 3306;
    $database = "techni"; 
    $username = getenv('C9_USER');
    $password = "";
    $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    
    // echo "Artist: " . $_POST["artist"] . "<br>" . 
    //     "Style: " . $_POST["style"] . "<br>" . 
    //     "Range: ". $_POST["range"] . "<br>"; 

    $productImgs = array(1 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/1.jpg\"></img></div>",
                        2 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/2.jpg\"></img></div>", 
                        3 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/3.jpg\"></img></div>", 
                        4 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/4.jpg\"></img></div>", 
                        5 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/5.jpg\"></img></div>",
                        6 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/6.jpg\"></img></div>",
                        7 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/7.png\"></img></div>",
                        8 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/8.jpg\"></img></div>",
                        9 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/9.jpg\"></img></div>",
                        10 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/10.jpg\"></img></div>", 
                        11 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/11.jpg\"></img></div>",
                        12 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/12.jpg\"></img></div>", 
                        13 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/13.jpg\"></img></div>",
                        14 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/14.jpg\"></img></div>", 
                        15 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/15.jpg\"></img></div>",
                        16 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/16.jpg\"></img></div>", 
                        17 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/17.jpg\"></img></div>", 
                        18 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/18.jpg\"></img></div>", 
                        19 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/19.jpg\"></img></div>", 
                        20 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/20.jpg\"></img></div>", 
                        21 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/busca.png\"></img></div>",
                        22 => "<div id=\"slider2\"><img style= \"width:100%; height = 100%;\" src=\"images/gift.png\"></img></div>"); 
    

    
    
    if((isset($_POST["artist"]) && $_POST["artist"] != "0") && (isset($_POST["style"]) && $_POST["style"] != "0") && (isset($_POST["range"]) && $_POST["range"] != "0")){
        
        //echo "Function 1 start. <br>";
        
        if(isset($_POST["direction"])){
            
            if($_POST["direction"] == "a"){
                
                $narrowDown = "SELECT Product.*  
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.price <= '" . $_POST["range"] . "' AND Product.style = '" . $_POST["style"] .
                       "' ORDER BY `Product`.price ASC";
                
            }
            else{
                
                $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.price <= '" . $_POST["range"] . "' AND Product.style = '" . $_POST["style"] .
                       "' ORDER BY `Product`.price DESC";
                
            }
            
        }
        else{
            
            $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.price <= '" . $_POST["range"] . "' AND Product.style = '" . $_POST["style"] .
                       "' ORDER BY `Product`.productName";
        }
        
       
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
          
            }// end of foreach 
        }// end of while 
    }
    if((isset($_POST["artist"]) && $_POST["artist"] != "0") && (isset($_POST["style"]) && $_POST["style"] != "0")){
        
        //echo "Function 2 start. <br>";
        
        $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.style = '" . $_POST["style"] . 
                       "' ORDER BY `Product`.productName";
        
        
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        
    }
    else if((isset($_POST["artist"]) && $_POST["artist"] != "0") && (isset($_POST["range"]) && $_POST["range"] != "0") ){
        
        //echo "Function 3 start. <br>";
        
        if(isset($_POST["direction"])){
            
            if($_POST["direction"] == "a"){
                
                $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.price <= '" . $_POST["range"] .
                       "' ORDER BY `Product`.price ASC";
                
            }
            else{
                
                $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.price <= '" . $_POST["range"] .
                       "' ORDER BY `Product`.price DESC";
                
            }
            
        }
        else{
            
            $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . "' AND Product.price <= '" . $_POST["range"] . 
                       "' ORDER BY `Product`.productName";
            
        }

        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
    }
    else if( (isset($_POST["style"]) &&  $_POST["style"] != "0" ) && (isset($_POST["range"]) && $_POST["range"] != "0") ){
        
        //echo "Function 4 start. <br>";
        
        if(isset($_POST["direction"])){
            
            if($_POST["direction"] == "a"){
                
               $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["style"] . "' AND Product.price <= '" . $_POST["range"] . 
                       "' ORDER BY `Product`.price ASC";
                
            }
            else{
                
                $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["style"] . "' AND Product.price <= '" . $_POST["range"] . 
                       "' ORDER BY `Product`.price DESC";
                
            }
            
        }
        else{
            
            $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["style"] . "' AND Product.price <= '" . $_POST["range"] . 
                       "' ORDER BY `Product`.productName";
        }
        
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        
    }
    else if(isset($_POST["artist"])  && $_POST["artist"] != "0"){
        
        //echo "Function 5 start. <br>";
        
        $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.artist = '" . $_POST["artist"] . 
                       "' ORDER BY `Product`.productName";
        
        
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
    
    }// end of if 
    else if(isset($_POST["style"]) && $_POST["style"] != "0"){
        
        //echo "Function 6 start. <br>";
        
        $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.style = '" . $_POST["style"] . 
                       "' ORDER BY `Product`.productName";
        
        
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        
    }
    else if(isset($_POST["range"]) && $_POST["range"] != "0" ){
        
        //echo "Function 7 start. <br>";
        
        if(isset($_POST["direction"])){
            
            if($_POST["direction"] == "a"){
                
               $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.price = '" . $_POST["range"] . 
                       "' ORDER BY `Product`.price ASC";
                
            }
            else{
                
                $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.price = '" . $_POST["range"] . 
                       "' ORDER BY `Product`.price DESC";
                
            }
            
        }
        else{
            
            $narrowDown = "SELECT Product.*
                       FROM Product 
                       INNER JOIN `Product Type` 
                       ON `Product Type`.productTypeID = Product.productTypeID 
                       WHERE Product.price = '" . $_POST["range"] . 
                       "' ORDER BY `Product`.productName";
        
        }
    
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
    }

?>

</div>
    
    
</body>

</html>