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
        $this->deleteTask();
    }

    protected function setFileName(){
        $fileName = str_replace(' ','-',$this->listName);
        $this->fileName = strtolower($fileName);
        $this->file = "$this->folder/$this->fileName.json";
    }

    protected function getActionType(bool $create = true) {
        $action = $create ? 'create' : 'delete';
        ?>
        <input type="hidden" name="action" value="<?=$action?>">
        <?php
    }

    public function renderForm(){
        ?>

            <h1><?=$this->listName?></h1>
            
            <form method="POST">
                <?php $this->getActionType() ?>
                <input type="text" name="todo-<?=$this->fileName?>" class="form-control mb-3" placeholder="Scrivi qualcosa">
                
                <button class="btn btn-primary">Salva</button>
                
            </form>
        
        <?php
    }


    public function renderDeleteForm(){

        ?>
        <form method="POST">
            <?php $this->getActionType(false) ?>
            <select name="deletedTask">
                <option value="" class="form-control">--seleziona--</option>
                <?php foreach($this->todos as $task):?>
                    <option value="<?=$task->id?>" class="form-control"><?=$task->text?></option>
                <?php endforeach;?>
            </select>

            <button class="btn btn-danger">Elimina</button>
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

        $this->todos = json_decode($listJson, false);
// echo '<pre>';
// var_dump($this->todos);
// echo '</pre>';
// die;
    }



    protected function addNewTodo(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        if($_POST['action'] != 'create') return;
    
        $newTodo = $_POST["todo-$this->fileName"] ?? '';
            
        if(empty($newTodo)) return;
                
                
        if(!is_dir($this->folder)){
            mkdir($this->folder);
        }
        
        $this->todos[] = new Task($newTodo);
                
        file_put_contents($this->file,json_encode($this->todos));
        // echo '<pre>';
        // var_dump($this->todos);
        // echo '</pre>';
        // die;     
            
    }

    protected function deleteTask(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        if($_POST['action'] != 'delete') return;

        $taskId = $_POST["deletedTask"] ?? '';
            
        if(empty($taskId)) return;

        $this->todos = array_filter($this->todos,fn($t) => $t->id !== $taskId);
    
        file_put_contents($this->file,json_encode(array_values($this->todos)));
    }

}


class Task{

    public $id;
    public $text;

    public function __construct(string $text){
        $this->id = uniqid('',true);
        $this->text = $text;
    }

}