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
            <li><a class="none" href="book.php?artWork=6">Books</a></li>
            <li><a class="none" href="mixed.php?artWork=5">Mixed Media</a></li>
            <li><a  href="Cart.php" ><img src="images/cart.png" style= "height: 25px; width: 25px; "/></a></li>
        </ul>
    </div>


<?php

    $servername = getenv('IP');
    $dbPort = 3306;
    $database = "techni"; 
    $username = getenv('C9_USER');
    $password = "";
    $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $grandTotal = 0; 

    //add to cart button is pressed
    if(!isset($_POST["addCart"])){
        
        $_SESSION["cart"] = array(); 
        $_SESSION["total"] = array();
    }
    if(isset($_POST["addCart"])){
        // pushes in the products id 
        // $_POST["addChart"]  == productID
        
        $price = "SELECT price, productName 
                    FROM `Product`
                    WHERE '" . $_POST["addCart"] . "' = productID"; 
        
        $priceState = $dbConn->prepare($price);
        $priceState->execute();
        $productPrice = $priceState->fetch();
        
        echo "Price: " . $productPrice["price"] . var_dump($productPrice["price"]) . "<br>Name: " . $productPrice["productName"] . var_dump($productPrice["productName"]) . "<br>";
 
        array_push($_SESSION["cart"], $productPrice["productName"]);
        array_push($_SESSION["total"], $productPrice["price"]);
        
        foreach($_SESSION["total"] as $key => $value){
            var_dump($value);
            echo "<br>";
            
        }
        foreach($_SESSION["cart"] as $key => $value){
            var_dump($value);
            echo "<br>";
            
        }
    
        
    }
    // when the order button is pressed 
    if(isset($_POST["ordered"])){
        
         // orderID 
    
        
        unset($_SESSION["cart"]);
        unset($_SESSION["total"]);
        $_SESSION["cart"] = array(); 
        $_SESSION["total"] = array();
    }
    
   if(isset($_POST["ship"])){
        
        $charge = 0; 
        

        if($_POST["ship"] == 1){
            
            $charge = 10;
            
            var_dump($_SESSION["total"] );
            foreach($_SESSION["total"] as $key => $value){
                
                $temp = intval($value);
                var_dump($temp);
                
                
                $charge += $temp; 
            }
            
            echo "<h3> Total is: " . $charge . " </h3>";
        }
        else{
            
            $charge = 60;
            
            echo "<h3> Total is: " . $charge . " </h3>";
        }
    }
    
    
    function calcTotal($charge){
        
        global $grandTotal; 
        foreach($_SESSION["total"] as $key => $value){
            var_dump($value);
            $grandTotal += intval($value); 
        }
        var_dump($_SESSION["total"]);
        $grandTotal += $charge; 
        return $grandTotal;
    }
    

       if(isset($_SESSION["cart"])){
           
          echo " <div style=\"overflow:hidden\">";
        echo " <table>";
        echo "<tr><th colspan=\"3\">Shopping Cart</th></tr>";
        echo "<tr style=\"background-color:#773b33\">";
        echo " <td colspan=\"2\"> ". "Item Name" ." </td> ";
        echo "</tr>";  
        foreach ($_SESSION["cart"] as $key =>$value) {
             echo " <td colspan=\"2\"> ".  $value ." </td> ";
            echo "</tr>";
            
            
        }
       }
    echo " </table>";
      echo "   </div>";
    echo "<form class=\"info\" action=\"checkout.php\" method=\"post\" name=\"data\">
        Shipping Options <input  type=\"radio\" name=\"ship\" value=\"1\"> FedEx 2-Day 
        <input class=\"radio\" type=\"radio\" name=\"ship\" value=\"3\"> FedEx Next-Day
        <br>    
        <br><input type=\"submit\" value=\"Total\" name =\"ordered\">
        </div>
        </form> ";
        

?>

</body>

</html>