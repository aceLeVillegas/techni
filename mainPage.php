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
            <form  action="returnData.php" method="post" name="data">
                Techni <input type="text" name="userName"/><input class="search" type="image" src="images/busca.png" alt="Submit">
            </form>
        </div>
    </div>
    
    <!-- This will be the bar with the categories -->
    <div class = "categories">
        <ul class="menu">
            <li><a class="visited" href="#">Main Page</a></li>
            <li><a class="none" href="page2.php?artWork=prints">Prints</a></li>
            <li><a class="none" href="page2.php?artWork=lithograph">Lithographs</a></li>
            <li><a class="none" href="page2.php?artWork=original">Original Artworks</a></li>
            <li><a class="none" href="page2.php?artWork=photo">Photography</a></li>
            <li><a class="none" href="page2.php?artWork=sculpture">Sculptures</a></li>
            <li><a class="none" href="page2.php?artWork=mixed">Mixed Media</a></li>
            <li><a class="none" href="page2.php?artWork=gift">Gift Cards</a></li>
        </ul>
    </div>
    
</body>

</html>