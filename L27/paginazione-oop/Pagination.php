<?php

class Pagination{

    public $limite;
    public $righePaginazione;
    public $pagina;

    public $articoli;

    public function __construct(int $limite = 10) {
        $this->limite = $limite;
        $this->getPagina();
    }

    private function getPagina(){
        $this->pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    }

    private function getPageCount(){

    }

    private function getPageContent(){

    }

    public function renderPaginatedContent(){

    }
    public function renderPagination(){

    }

}