<?php


if(isset($_GET['artWork']) ){
echo $_GET['artWork'];

}
?>

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
            <li><a class="none" href="gift.php?artWork=4">Gift Cards</a></li>
            <li><a class="visited" href="mixed.php?artWork=5">Mixed Media</a></li>             
        </ul>
    </div>
    
    <!-- This is the main gallery -->
    <div id="content">
      
      <!-- Filters -->
      <div id="filters">
           <h3> Select From the Following Filters </h3>
           <form class="info" action="practice_program1.php" method="post" name="data">
         
         <br>  <select class = "select" name="artist" value="">
                <option value="0">Artist</option>
                <option value="7">7X7</option>
                <option value="8">8X8</option>
                <option value="9">9X9</option>
                <option value="10">10X10</option>
              
        </select>
            <br> <br> <select class = "select" name="style" value="">
                <option value="0">Style</option>
                <option value="7">7X7</option>
                <option value="8">8X8</option>
                <option value="9">9X9</option>
                <option value="10">10X10</option>
                </select>
                <br>
        
            <br>  <select class = "select" name="period" value="">
                <option value="0">Period</option>
                <option value="7">7X7</option>
                <option value="8">8X8</option>
                <option value="9">9X9</option>
                <option value="10">10X10</option>
                </select>
                <br><br>
        Sort by Price <input  type="radio" name="asc" value="1"> Ascending 
        <input class="radio" type="radio" name="desc" value="2"> Descending
        <br>    
        <br><input type="submit" value="Submit">
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