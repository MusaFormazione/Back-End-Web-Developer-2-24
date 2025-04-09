<?php
require_once __DIR__ . '/../config.php';

class ErrorHandler{

    public static function redirectToHome(string $message = "", bool $error = false): void
    {
        self::redirectTo("index.php", $message, $error);
    }

    public static function redirectTo(string $location, string $message = "", bool $error = false)
    {
        $messageParam = $message ? "?message=" . urlencode($message) : "";
        $errorParam = $error ? "&error=1" : "";
        header("Location: " . BASE_URL . "{$location}{$messageParam}{$errorParam}");
        die;
    }

    public static function checkPostRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            self::redirectToHome("Pagina non accessibile", true);
    }


    public static function hasSuccessMessage(): bool
    {
        return isset($_GET['message']) && !isset($_GET['error']);
    }

    public static function hasErrorMessage(): bool
    {
        return isset($_GET['message']) && isset($_GET['error']);
    }

    /**
     * 
     * @param string[] $names
     * @return array
     * 
     * 
     * Funzione utilizzata per verificare l'esistenza e il. Il valore dei dati inviati via method POST da un form 
     * Richiede una lista di stringhe da ricercare come chiave all'interno delL'array post 
     * 
     * In caso di successo restituisce i dati Controllati 
     * 
     * In caso di dati assenti o vuoti crea un redirect alla home con un messaggio di errore 
     * 
     */
    public static function getCheckedData(string ...$names): array
    {

        $checkedData = [];

        foreach ($names as $name) {
            if (!isset($_POST[$name]) || (empty($_POST[$name]) && $_POST[$name] != 0)) {
                self::redirectToHome("Tutti i campi devono essere compilati", true);
            }

            $checkedData[$name] = $_POST[$name];
        }

        return $checkedData;
    }


    public static function renderMessages(){
        if(ErrorHandler::hasSuccessMessage()):?>
  
            <div class="alert alert-success">
              <?=$_GET['message']?>
            </div>
            
        <?php endif; 
        if(ErrorHandler::hasErrorMessage()): ?>
              
              <div class="alert alert-danger">
                <?=$_GET['message']?>
              </div>
            
          <?php endif;
    }


}