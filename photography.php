
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
            <li><a class="visited" href="photography.php?artWork=3">Photography</a></li>
            <li><a class="none" href="book.php?artWork=6">Books</a></li>
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
                <option value="1000000000">1000000000</option>
                <option value="100000000">100000000</option>
                <option value="10000000">10000000</option>
                <option value="1000000">1000000</option>
                <option value="100000">100000</option>
                <option value="10000">10000</option>
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
       
           
            
     $files = glob("images/*.*");
     for ($i=1; $i<10; $i++)
      {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {
             echo "<div id=\"slider2\">";
             echo '<img  style= "width:100%;" height = "100%;" src="'.$image .'" alt="Random image" />'."<br /><br />";
             echo "</div>";
            } else {
                continue;
            }
     }
    
    ?>
   </div>
</div>
    
    
</body>

</html>