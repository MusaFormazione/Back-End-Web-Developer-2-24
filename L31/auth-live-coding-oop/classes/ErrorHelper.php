<?php

class ErrorHelper{

    public static function setSessionError($message, $redirectUrl = null): never{
        $_SESSION['error'] = true;
        $_SESSION['message'] = 'Utente già esistente';
        
        if($redirectUrl) header("Location: ". $redirectUrl);
        die;
    }

    public static function setSessionMessage($message): void{
        $_SESSION['error'] = false;
        $_SESSION['message'] = $message;
    }

    public static function clearSessionMessage(): void{
        unset($_SESSION['error']);
        unset($_SESSION['message']);
    }

    public static function displayMessage(): void{
        if(isset($_SESSION)){

    
            if(isset($_SESSION['message'])) {
        
                $error = $_SESSION['error'] ?? false;
                $message = $_SESSION['message'];
        
                $alertClass = $error ? "danger" : "success";
        
                echo "<div class=\"alert alert-$alertClass\">
                        $message
                    </div>";
        
                ErrorHelper::clearSessionMessage();
            }
              
        }
    }

    

}