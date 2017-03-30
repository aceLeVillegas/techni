<?php

    //add to cart button is pressed
    if(isset($_POST["addChart"])){
        
        $_SESSION["cart"] = array(); 
    }
    if(isset($_POST["addCart"])){
        // pushes in the products id 
        // $_POST["addChart"]  == productID
        array_push($_SESSION["cart"], $_POST["addChart"]);
    }
    
    // when the order button is pressed 
    if(isset($_POST["ordered"])){
        
        unset($_SESSION["cart"]);
    }
    
    
    

?>