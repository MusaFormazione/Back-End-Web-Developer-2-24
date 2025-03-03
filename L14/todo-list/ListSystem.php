<?php
class ListSystem{
    protected $name;
    protected $folder;
    protected $file;

    protected $todos = [];


    public function __construct(string $name, string $folder = 'todo-list-files') {
        $this->name = $name;
        $this->folder = $folder;
        
        $fileName = str_replace(' ','-',$name);
        $this->file = "$folder/$fileName";
    }

    function renderForm(){
        ?>

            <h1><?=$this->name?></h1>
            
            <form method="POST">
                
                <input type="text" name="todo" class="form-control mb-3" placeholder="Scrivi qualcosa">
                
                <button class="btn btn-primary">Salva</button>
                
            </form>
        
        <?php
    }


    protected function addNewTodo(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST') return;
    
        $newTodo = $_POST['todo'] ?? '';
            
        if(empty($newTodo)) return;
                
                
        if(!is_dir($this->folder)){
            mkdir($this->folder);
        }
        
        $this->todos[] = $newTodo;
                
        file_put_contents($this->file,json_encode($this->todos));
                
            
    }

}