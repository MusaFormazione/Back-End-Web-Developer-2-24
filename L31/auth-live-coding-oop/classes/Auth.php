<?php
require_once __DIR__. '../config.php';
include __DIR__ . './Connection.php';
include __DIR__. './ErrorHelper.php';

class Auth extends Connection{

    private $db;

    private $user = null;
    private $loginRoute;
    private $registerRoute;
    private $dashBoardRoute;

    public function __construct(string $loginRoute, string $registerRoute, string $dashBoardRoute) {
        parent::__construct("livecoding_2_24_auth", "Michele", "password");

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        $this->db = $this->getConnection();

        $this->loginRoute = $loginRoute;
        $this->registerRoute = $registerRoute;
        $this->dashBoardRoute = $dashBoardRoute;
    }

    /**
     * Summary of validateFields
     * @param array $fields Lista di chiavi attese
     * @param array $data Dati da validare (es. $_POST)
     * @return void
     */
    private function validateFields(array $fields, array $data, string $redirectUrl): array{
        $sanitized = [];

        foreach($fields as $field){
            if(empty($data[$field])){
                ErrorHelper::setSessionError('Compila i campi obbligatori',  BASE_URL. $redirectUrl);
            }
            $sanitized[$field] = trim(strip_tags($data[$field]));
        }

        return $sanitized;
    }

    public function register(array $data): void{

        [
            'nome' => $nome,
            'cognome' => $cognome,
            'email' => $email,
            'password' => $password
        ] = $this->validateFields(['nome', 'cognome', 'email', 'password'], $data, '/register.php');
 
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        try{


            $this->db->beginTransaction();
            
            $sql = "INSERT INTO utenti (nome, cognome, email, password_hash) VALUE (:nome, :cognome, :email, :password_hash)";
            //uso prepare e bindParams per questioni di sicurezza
            $query = $this->db->prepare($sql);
        
            $query->bindParam(':nome',$nome);
            $query->bindParam(':cognome',$cognome);
            $query->bindParam(':email',$email);
            $query->bindParam(':password_hash',$passwordHash);
        
            $query->execute();
        
            $this->db->commit();
        
            ErrorHelper::setSessionMessage('Utente registrato con successo!');
        
        }catch(PDOException $e){
        
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            
            if($e->errorInfo[1] == 1062){
                ErrorHelper::setSessionError('Utente già esistente', BASE_URL. $this->registerRoute);               
            }
            
            ErrorHelper::setSessionError($e->getMessage(), BASE_URL. $this->registerRoute);
            
        }

    }

    public function login(array $data): void{

        try{

        [
            'email' => $email,
            'password' => $password
        ] = $this->validateFields(['email', 'password'], $data, '/register.php');

            $sql = "SELECT * FROM utenti WHERE email = :email";
            $query = $this->db->prepare($sql);
            
            $query->bindParam(':email',$email);
            
            $query->execute();
            
            $utente = $query->fetch(PDO::FETCH_ASSOC);
        
            if(!$utente){
                ErrorHelper::setSessionError("Utente non trovato", BASE_URL . $this->loginRoute);
            }
        
        
            if(!password_verify($password, $utente['password_hash'])) die('Password errata');
            
            unset($utente['password_hash']);
            $_SESSION['user'] = $utente;
            $this->user = $utente;
        
            ErrorHelper::setSessionMessage("Accesso effettuato come {$utente['nome']}");
        
        }catch(PDOException $e){
        
            ErrorHelper::setSessionError($e->getMessage(), BASE_URL. $this->loginRoute);
        
        }

    }

    public function logout(string $redirectUrl = BASE_URL){

        session_unset();
        session_destroy();

        $this->user = null;

        header('Location: ' . $redirectUrl);
    }


    public function isLoggedIn(): bool{
        return $this->user !==  null;
    }

    public function getLoggedUser():array|null{
        return $this->user;
    }

    public function getUserId(): void{
        return $this->user['id'] ?? null;
    }

    public function loggedUserField(string $field):void{
        echo $this->user[$field] ?? null;
    }

    public function requireLogin(string $redirectUrl = $this->dashBoardRoute){
        if(!$this->isLoggedIn()){
            ErrorHelper::setSessionError('Devi effettuare il login per accedere a questa pagina', BASE_URL. $redirectUrl);
        }
    }

    public function requireGuest(string $redirectUrl = $this->dashBoardRoute){
        if(!$this->isLoggedIn()){
            ErrorHelper::setSessionError('Non puoi accedere a questa pagina se sei loggato', BASE_URL. $redirectUrl);
        }
    }

}