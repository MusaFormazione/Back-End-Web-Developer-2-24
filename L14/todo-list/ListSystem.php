<?php
class ListSystem{
    protected $listName;
    protected $folder;
    protected $file;
    protected $fileName;

    protected $todos = [];


    public function __construct(string $listName, string $folder = 'todo-list-files') {
        $this->listName = $listName;
        $this->folder = $folder;
        
        $this->setFileName();
        
        $this->getListData();

        $this->addNewTodo();
    }

    protected function setFileName(){
        $fileName = str_replace(' ','-',$this->listName);
        $this->fileName = strtolower($fileName);
        $this->file = "$this->folder/$this->fileName.json";
    }

    public function renderForm(){
        ?>

            <h1><?=$this->listName?></h1>
            
            <form method="POST">
                
                <input type="text" name="todo-<?=$this->fileName?>" class="form-control mb-3" placeholder="Scrivi qualcosa">
                
                <button class="btn btn-primary">Salva</button>
                
            </form>
        
        <?php
    }


    public function renderList(){


        foreach($this->todos as $todo):?>

            <div class="alert alert-success"> <?=$todo->text?> </div>

        <?php
        endforeach;
    }

    protected function getListData(){

        if(!file_exists($this->file)) return;

        $listJson = file_get_contents($this->file);

        if(!$listJson) return;

        $this->todos = json_decode($listJson);
    }



    protected function addNewTodo(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST') return;
    
        $newTodo = $_POST["todo-$this->fileName"] ?? '';
            
        if(empty($newTodo)) return;
                
                
        if(!is_dir($this->folder)){
            mkdir($this->folder);
        }
        
        $this->todos[] = new Task($newTodo);
                
        file_put_contents($this->file,json_encode($this->todos));
                
            
    }

}


class Task{

    protected $id;
    public $text;

    public function __construct(string $text){
        $this->id = uniqid();
        $this->text = $text;
    }

}