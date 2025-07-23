<?php
//Questo file non è un file di laravel, ma ci serve come strumento didattico per capire(o ricordarci) un po' come funziona come funziona Query builder

//Prima di tutto devi importare il namespace corretto
use Illuminate\Support\Facades\DB;

//Gli esempi che vedi non hanno a che fare con alcuna tabella esistente. Questo file non è fatto per essere eseguito, ma solo letto.
//Supponiamo di avere una tabella users

//Esempio 1: Recuperare tutti i record dalla tabella users
$users = DB::table('users')->get();
//è come la vecchia variabile $sql = SELECT * FROM users;
//Ma non solo, In realtà query builder fa molto altro, ad esempio grazie al metodo get esegue la query e fa. E fa una serie di controlli anche lato sicurezza.
//Non sarà necessario neanche fare fetchAll(PDO::FETCH_ASSOC)

//Esempio 2: Recuperare il primo record dalla tabella users
$users = DB::table('users')->first();//non serve chiamare get
//SELECT * FROM users LIMIT 1;

//Esempio 3: Recuperare solo la colonna name dalla tabella users (una lista di nomi di tutti gli utenti)
//Esempio 3: Recuperare solo la colonna name dalla tabella users (una lista di nomi di tutti gli utenti)
$names = DB::table('users')->pluck('name');
//SELECT name FROM users;

//Esempio 4: Recuperare gli utenti attivi con ruolo admin
$users = DB::table('users')
->where('active',1)
->where('role','admin')
->get();
//SELECT * FROM users WHERE active = 1 AND role = admin;

//Esempio 5: Recuperare i primi 10 utenti attivi, ordinati per nome
$users = DB::table('users')
->where('active',1)
->take(10)
->orderBy('name','asc')
->get();
//SELECT * FROM users WHERE active = 1 ORDER BY name ASC LIMIT 10;


//Esempio 6: Inserire un nuovo utente nella tabella users
DB::table('users')->insert([
    'name' => 'Mario',
    'lastname' => 'Rossi',
    'active' => 1,
    'role' => 'admin',
    'email' => 'mario@rossi.it',
    'password' => bcrypt('password123')
]);
//INSERT INTO users (name, lastname, active, role, email, password) VALUES ('Mario','Rossi',1,'admin','mario@rossi.it',[password criptata])

//Esempio 7: Inserire un nuovo utente nella tabella users ed ottenere l'id generato
$id = DB::table('users')->insertGetId([
    'name' => 'Mario',
    'lastname' => 'Rossi',
    'active' => 1,
    'role' => 'admin',
    'email' => 'mario@rossi.it',
    'password' => bcrypt('password123')
]);

//Esempio 8: Aggiornare il nome dell'utente con id 1
$id = DB::table('users')
->where('id',1)
->update(['name','Marco']);
//UPDATE users SET name = 'Marco' WHERE id = 1

//Esempio 9: Eliminare l'utente con id 1
$id = DB::table('users')
->where('id',1)
->delete();
//DELETE FROM users WHERE id = 1
