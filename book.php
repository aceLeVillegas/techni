
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
            <li><a class="none" href="painting.php?artWork=1">Painting</a></li>
            <li><a class="none" href="sculpture.php?artWork=2">Sculptures</a></li>
            <li><a class="none" href="photography.php?artWork=3">Photography</a></li>
            <li><a class="visited" href="book.php?artWork=6">Books</a></li>
            <li><a class="none" href="mixed.php?artWork=5">Mixed Media</a></li>  
            <li><a  href="Cart.php" ><img src="images/cart.png" style= "height: 25px; width: 25px; "/></a></li>
        </ul>
    </div>
    
    <!-- This is the main gallery -->
    <div id="content">
      
      <!-- Filters -->
      <div id="filters">
           <h3> Select From the Following Filters </h3>
           <form class="info" action="SearchingTechni.php" method="post" name="data">
          
<?php


if(isset($_GET['artWork']) ){
       // Set the Cloud 9 MySQL related information...this is set in stone by C9!
    $servername = getenv('IP');
    $dbPort = 3306;
    
    // Which database (the name of the database in phpMyAdmin)?
    $database = "techni";
    
    // My user information...I could have prompted for password, as well, or stored in the
    // environment, or, or, or (all in the name of better security)
    $username = getenv('C9_USER');
    $password = "";
    
    
    // Establish the connection and then alter how we are tracking errors (look those keywords up)
    $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   

    
      $whereSql = "SELECT P.artist, P.productTypeID
                    FROM Product P
                    WHERE P.productTypeID = ".$_GET['artWork']."
                    GROUP BY P.artist";
        
        // The prepare caches the SQL statement for N number of parameters imploded above
        $whereStmt = $dbConn->prepare($whereSql);
        
        $whereStmt->execute();
        
        echo "<br>  <select class = \"select\" name=\"artist\" >";
        echo "<option value=\"0\">Artist</option>";
        while ($whereRow = $whereStmt->fetch(PDO::FETCH_ASSOC))  {

            echo " <option value=\"" . $whereRow['artist'] . "\">" . $whereRow['artist'] . "</option>";
              
        }

    echo "</select>";


    $whereSql = "SELECT P.style, P.productTypeID
                    FROM Product P
                    WHERE P.productTypeID = ".$_GET['artWork']."
                    GROUP BY P.style";
        
        // The prepare caches the SQL statement for N number of parameters imploded above
        $whereStmt = $dbConn->prepare($whereSql);
        
        $whereStmt->execute();
        
        echo "<br> <br> <select class = \"select\" name=\"style\" >";
        echo "<option value=\"0\">Style</option>";
        while ($whereRow = $whereStmt->fetch(PDO::FETCH_ASSOC))  {

            echo " <option value=\"" . $whereRow['style'] . "\">" . $whereRow['style'] . "</option>";
              
        }
        echo "</select>";
            
                
}
?> 
           <br><br>  <select class = "select" name="range" value="">
                <option value="0">Max Price</option>
                <option value="500">500</option>
                <option value="400">400</option>
                <option value="300">300</option>
                <option value="200">200</option>
                <option value="100">100</option>
                <option value="50">50</option>
                </select>
                <br><br>

        Sort by Price <input  type="radio" name="direction" value="a"> Ascending 
        <input class="radio" type="radio" name="direction" value="d"> Descending
        <br>    
        <br><input type="submit" value="Submit" name ="submit">
        </div>
        </form>   
      </div>
      
       <?php
       
        $productImgs = array(1 => "<div><div id=\"1\" class=\"slider2\"><img id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/1.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"1\"> Order</div>",
                            2 => "<div id=\"2\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/2.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"2\"> Order</div>", 
                            3 => "<div id=\"3\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/3.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"3\"> Order</div>", 
                            4 => "<div id=\"4\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/4.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"4\"> Order</div>", 
                            5 => "<div id=\"5\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/5.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"5\"> Order</div>",
                            6 => "<div id=\"6\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/6.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"6\"> Order</div>",
                            7 => "<div id=\"7\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/7.png\"></img><input  type=\"radio\" name=\"addCart\" value=\"7\"> Order</div>",
                            8 => "<div id=\"8\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/8.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"8\"> Order</div>",
                            9 => "<div id=\"9\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/9.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"9\"> Order</div>",
                            10 => "<div id=\"10\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/10.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"10\"> Order</div>", 
                            11 => "<div id=\"11\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/11.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"11\"> Order</div>",
                            12 => "<div id=\"12\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/12.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"12\"> Order</div>", 
                            13 => "<div id=\"13\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/13.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"13\"> Order</div>",
                            14 => "<div id=\"14\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/14.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"14\"> Order</div>", 
                            15 => "<div id=\"15\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/15.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"15\"> Order</div>",
                            16 => "<div id=\"16\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/16.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"16\"> Order</div>", 
                            17 => "<div id=\"17\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/17.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"17\"> Order</div>", 
                            18 => "<div id=\"18\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/18.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"18\"> Order</div>", 
                            19 => "<div id=\"19\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/19.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"19\"> Order</div>", 
                            20 => "<div id=\"20\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/20.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"20\"> Order</div>", 
                            21 => "<div id=\"21\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/21.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"21\"> Order</div>",
                            22 => "<div id=\"22\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/gift.png\"></img><input  type=\"radio\" name=\"addCart\" value=\"22\"> Order</div>",
                            23 => "<div id=\"23\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/23.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"23\"> Order</div>", 
                            24 => "<div id=\"24\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/24.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"24\"> Order</div>", 
                            25 => "<div id=\"25\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/25.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"25\"> Order</div>",
                            26 => "<div id=\"26\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/26.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"26\"> Order</div>",
                            27 => "<div id=\"27\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/27.png\"></img><input  type=\"radio\" name=\"addCart\" value=\"27\"> Order</div>",
                            28 => "<div id=\"28\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/28.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"28\"> Order</div>",
                            29 => "<div id=\"29\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/29.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"29\"> Order</div>",
                            30 => "<div id=\"30\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/30.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"30\"> Order</div>", 
                            31 => "<div id=\"31\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/31.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"31\"> Order</div>",
                            32 => "<div id=\"32\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/32.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"32\"> Order</div>", 
                            33 => "<div id=\"33\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/33.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"33\"> Order</div>",
                            34 => "<div id=\"34\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/34.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"34\"> Order</div>", 
                            35 => "<div id=\"35\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/35.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"35\"> Order</div>",
                            36 => "<div id=\"36\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/36.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"36\"> Order</div>", 
                            37 => "<div id=\"37\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/37.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"37\"> Order</div>", 
                            38 => "<div id=\"38\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/38.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"38\"> Order</div>", 
                            39 => "<div id=\"39\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/39.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"39\"> Order</div>", 
                            40 => "<div id=\"40\" class=\"slider2\" ><img  id =\"mask2\" style= \"width:100%; height = 100%;\" src=\"images/40.jpg\"></img><input  type=\"radio\" name=\"addCart\" value=\"40\"> Order</div>"); 
       
      if(isset($_GET["artWork"])){
        
        //echo "Function 5 start. <br>";
        
        $narrowDown = "SELECT Product.*
                      FROM Product 
                      WHERE Product.productTypeID = '" . $_GET["artWork"] . 
                      "' ORDER BY `Product`.productName";
        
        
        $narState = $dbConn->prepare($narrowDown);
        $narState->execute();
        
         echo "<form class=\"info\" action=\"Cart.php\" method=\"post\" name=\"addCart\">";
        $index = 0;
        while ($na = $narState->fetch()){
            

            foreach($productImgs as $key => $value){
                
                if($na['productID'] == $key){
                    
                    echo $value; 
                    echo "<a class='button' href='#popup" . $index . "'>Description</a>";
                    echo "<div id='popup" . $index . "' class='overlay'>";
        	                echo "<div class='popup'>";
        		                echo "<h2>Description</h2>";
        		                echo "<a class='close' href='#'>&times;</a>";
        		                echo "<div class='content'>";
        		                    echo $na["description"];
        		                echo "</div>";
        	                echo "</div>";
                        echo "</div>";
                    $index++;
                }
                
            }// end of foreach 

        }// end of while 
        echo "<br><input type=\"submit\" value=\"Purchase\" name =\"Purchase\">
        </form>";  
    
    }// end of if 
    
    ?>
   </div>
</div>
    
    
</body>

</html>