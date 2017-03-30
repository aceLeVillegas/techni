<?php

    $servername = getenv('IP');
    $dbPort = 3306;
    $database = "Techni"; 
    $username = getenv('C9_USER');
    $password = "";
    $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $grandTotal = 0; 

    //add to cart button is pressed
    if(!isset($_POST["addChart"])){
        
        $_SESSION["cart"] = array(); 
        $_SESSION["total"] = array();
    }
    if(isset($_POST["addCart"])){
        // pushes in the products id 
        // $_POST["addChart"]  == productID
        
        $price = "SELECT price 
                    FROM `Product`
                    WHERE '" . $_POST["addCart"] . "' = productID"; 
        
        $priceState = $dbConn->prepare($price);
        $priceState->execute();
        $productPrice = $priceState->fetch();
        array_push($_SESSION["cart"], $_POST["addChart"]);
        array_push($_SESSION["total"], $productPrice["price"]);
    }
    // when the order button is pressed 
    if(isset($_POST["ordered"])){
        
        unset($_SESSION["cart"]);
    }
    
    // orderID 
    if(isset($_POST["ship"])){
        
        $charge = 0; 
        
        if($_POST["ship"] == 1){
            
            $charge = 10000000;
            calcTotal($charge);
        }
        else{
            
            $charge = 60000000;
            calcTotal($charge);
        }
    }
    
    
    function calcTotal($charge){
        
        global $grandTotal; 
        
        foreach($_SESSION["total"] as $key => $value){
            
            $grandTotal += $value; 
        }
        
        $grandTotal += $charge; 
    }
    

?>