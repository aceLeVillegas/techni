<?php
session_start();
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
            <li><a class="visited" href="#">Main Page</a></li>
            <li><a class="none" href="painting.php?artWork=1">Painting</a></li>
            <li><a class="none" href="sculpture.php?artWork=2">Sculptures</a></li>
            <li><a class="none" href="photography.php?artWork=3">Photography</a></li>
            <li><a class="none" href="gift.php?artWork=4">Gift Cards</a></li>
            <li><a class="none" href="mixed.php?artWork=5">Mixed Media</a></li>            
        </ul>
    </div>
    
    <!-- This is the main gallery -->
    <div id="content-slider">
      <div id="slider">  <!-- Slider container -->
         <div id="mask">  <!-- Mask -->

         <ul>
         <li id="first" class="firstanimation">  <!-- ID for tooltip and class for animation -->
         <a href="#"> <img src="images/13.jpg" style= "height: 620px; width: 680px;" alt="Cougar"/> </a>
         </li>

         <li id="second" class="secondanimation">
         <a href="#"> <img src="images/6.jpg"  style= "height: 620px; width: 680px;" alt="Lions"/> </a>
         </li>

         <li id="third" class="thirdanimation">
         <a href="#"> <img src="images/7.png" style= "height: 620px; width: 680px;" alt="Snowalker"/> </a>
         </li>

         <li id="fourth" class="fourthanimation">
         <a href="#"> <img src="images/gift.png" style= "height: 620px; width: 680px;" alt="Howling"/> </a>
         </li>

         <li id="fifth" class="fifthanimation">
         <a href="#"> <img src="images/5.jpg" style= "height: 620px; width: 680px;" alt="Sunbathing"/> </a>
         </li>
         </ul>

      </div>  <!-- End Slider Container -->
   </div>
</div>
    
    
</body>

</html>