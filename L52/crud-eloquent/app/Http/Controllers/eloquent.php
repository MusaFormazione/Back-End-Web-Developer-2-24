<?php
use App\Models\User;//Se non richiami namespace corretto per lo user, il resto del codice non potrà funzionare

//Questo file è solo un promemoria per ricordarci e approfondire come funziona Eloquent
//Siccome eloquent ha bisogno di un model per funzionare, adopereremo il modello User, che però in questa applicazione CRUD non sarà rilevante

//Esempio 1: Recuperare tutti i record della tabella users.
$users = User::all();
//SQL: SELECT * FROM users

//Esempio 2: Recuperare solo il primo record della tabella users
$firstUser = User::first();
//SQL: SELECT * FROM users LIMIT 1

//Esempio 3: Recuperare solo i nomi della tabella users
$names = User::pluck('name');
//SQL: SELECT name FROM users

//Esempio 4: Recuperare e filtrare gli utenti attivi con ruolo Admin
$users = User::where('active',1)->where('role','admin')->get();
//SQL: SELECT * FROM users WHERE active = 1 AND role = 'admin';

//Esempio 5: Recuperare e filtrare gli utenti attivi, ordinarli per nome, e limitarli a 10
$users = User::where('active',1)->orderBy('name','asc')->take(10)->get();
//SQL: SELECT * FROM users WHERE active = 1 ORDER BY name ASC LIMIT 10';

//Esempio 6: Inserire un nuovo utente nella tabella users (metodo 1)
//Istanziando user e poi invocando il metodo save
$user = new User();
$user->name = 'Mario';
$user->email = 'mario@rossi.it';
$user->password = bcrypt('password');
$user->save();

//esempio 7: Inserire un nuovo utente usando il metodo create E ottenere l'oggetto utente
$newUser = User::create([
    'name' => 'Mario',
    'email' => 'luigi@example.it',
    'password' => bcrypt('password')
]);

//SQL: INSERT INTO users (name, email, password) VALUES ('Mario','Luigi@example.it',[hashed password])

//Esempio 8: Aggiornare il nome dell'utente con ID 1
$user = User::find(1);
$user->name = 'Marco';
$user->save();

//Esempio 9:Eliminare l'utente con ID 1
$user = User::find(1);
//verifico sel'utente esiste
$user->delete();//poi elimino


//Esempio 10: Recuperare e filtrare nome e email degli utenti attivi, ordinare gli utenti per nome, e limitarli a 10
$users = User::where('active',1)->orderBy('name','asc')->take(10)->get(['name','email']);
//SQL: SELECT name, email FROM users WHERE active = 1 ORDER BY name ASC LIMIT 10';
