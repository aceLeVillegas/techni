<?php session_start(); ?>

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
             <li><a  href="Cart.php" ><img src="images/cart.png" style= "height: 25px; width: 25px; "/></a></li>
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
    
    

    $productImgs = array(1 => "<div><div id=\"1\" class=\"slider2\"><img id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/1.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"1\"> Order</div>",
                        2 => "<div id=\"2\" class=\"slider2\"><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/2.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"2\"> Order</div>", 
                        3 => "<div id=\"3\" class=\"slider2\"><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/3.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"3\"> Order</div>", 
                        4 => "<div id=\"4\" class=\"slider2\"><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/4.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"4\"> Order</div>", 
                        5 => "<div id=\"5\" class=\"slider2\"><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/5.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"5\"> Order</div>",
                        6 => "<div id=\"6\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/6.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"6\"> Order</div>",
                        7 => "<div id=\"7\"  class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/7.png\"></img><input  type=\"radio\" name=\"addCart\" value=\"7\"> Order</div>",
                        8 => "<div id=\"8\"  class=\"slider2\" ><img id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/8.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"8\"> Order</div>",
                        9 => "<div id=\"9\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/9.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"9\"> Order</div>",
                        10 => "<div id=\"10\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/10.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"10\"> Order</div>", 
                        11 => "<div id=\"11\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/11.jpg\"><input  type=\"radio\" name=\"addCart\" value=\"11\"> Order</img></div>",
                        12 => "<div id=\"12\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/12.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"12\"> Order</div>", 
                        13 => "<div id=\"13\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/13.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"13\"> Order</div>",
                        14 => "<div id=\"14\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/14.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"14\"> Order</div>", 
                        15 => "<div id=\"15\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/15.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"15\"> Order</div>",
                        16 => "<div id=\"16\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/16.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"16\"> Order</div>", 
                        17 => "<div id=\"17\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/17.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"17\"> Order</div>", 
                        18 => "<div id=\"18\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/18.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"18\"> Order</div>", 
                        19 => "<div id=\"19\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/19.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"19\"> Order</div>", 
                        20 => "<div id=\"20\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/20.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"20\"> Order</div>", 
                        21 => "<div id=\"21\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/busca.png\"></img><input  type=\"radio\" name=\"addCart\" value=\"21\"> Order</div>",
                        22 => "<div id=\"22\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/gift.png\"></img><input  type=\"radio\" name=\"addCart\" value=\"22\"> Order</div>"); 

    
    
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
        echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";

        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
          
            }// end of foreach 
        }// end of while 
         echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>";  
    
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
        
         echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>"; 
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
        
        echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while
        echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>"; 
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
        
        echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>"; 
        
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
        
        
        echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        
        echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>"; 
    
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
        
        
        echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        
         echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>"; 
        
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
        
        
        echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        while ($na = $narState->fetch()){
            
            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    
                }
                
            }// end of foreach 

        }// end of while 
        
         echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>"; 
    }

?>

</div>
    
    
</body>

</html>