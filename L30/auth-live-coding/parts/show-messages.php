<?php

if(isset($_SESSION)){

    
    if(isset($_SESSION['message'])) {

        $error = $_SESSION['error'] ?? false;
        $message = $_SESSION['message'];

        $alertClass = $error ? "danger" : "success";

        echo "<div class=\"alert alert-$alertClass\">
                $message
            </div>";

        unset($_SESSION['error']);
        unset($_SESSION['message']);
    }
      
}