<?php
require_once __DIR__ . '/Connection.php';
class Pagination extends Connection{

    protected $limite;
    protected $righePaginazione;
    protected $pagina;
    protected $prodotti;

    public function __construct(int $limite = 10){
        parent::__construct("ecommerce-2-24", "Michele", "password");

        $this->limite = $limite;
        $this->checkPagina();
        $this->getPageCount();
        $this->getPageContent();
    }

    public function getPagina(){
        return $this->pagina;
    }
    
    private function checkPagina(): void
    {
        $this->pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
        if (!filter_var($this->pagina, FILTER_VALIDATE_INT))
            die('Errore nell\'ottenere la pagina');
    }

    private function getPageCount(): void
    {
        $sql = "SELECT count(*) FROM prodotti";
        $query = $this->getConnection()->query($sql);

        if (!$query)
            die('Errore di paginazione');

        $totaleRighe = $query->fetchColumn();
        $this->righePaginazione = ceil($totaleRighe / $this->limite);
    }

    private function getPageContent(): void
    {
        $offset = ($this->pagina - 1) * $this->limite;


        //Query dei contenuti con limit e offset per ottenere i contenuti della pagina scelta
        $sql = "SELECT * FROM prodotti ORDER BY id ASC LIMIT $this->limite OFFSET $offset";
        $query = $this->getConnection()->query($sql);

        if (!$query)
            die('Errore nel recuperare gli prodotti');

        $this->prodotti = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function renderPaginatedContent(string $cardTemplate, string $boxClasses = "col-12 col-md-6 col-lg-3 mb-3", ?Auth $auth = null): void
    {
        foreach ($this->prodotti as $articolo):
            [
                'id' => $id,
                'nome' => $nome,
                'prezzo' => $prezzo
            ] = $articolo;
            ?>

            <div class="<?= $boxClasses ?>">
                <?php include "$cardTemplate" ?>
            </div>

        <?php endforeach;
    }

    
    protected function renderPreviusPageLink(): void{
        $paginaPrecedente = $this->pagina - 1;
        if ($this->pagina > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?= "?pagina=$paginaPrecedente" ?>">Previous</a>
            </li>
        <?php endif;

    }

    protected function renderNextPageLink(): void{
        $paginaSuccessiva = $this->pagina + 1;
        if ($this->pagina < $this->righePaginazione): ?>
            <li class="page-item">
                <a class="page-link" href="<?= "?pagina=$paginaSuccessiva" ?>">Next</a>
            </li>
        <?php endif;
    }
    
    public function renderPagination(): void{
        ?>
        <nav>
            <ul class="pagination">

                <?php

                $this->renderPreviusPageLink();

                for ($i = 1; $i <= $this->righePaginazione; $i++): 
                    $active = $i === $this->pagina ? "active" : "";

                    if($this->righePaginazione == 1) continue;
                ?>
                    <li class="page-item">
                        <a class="page-link <?=$active?>" href="?pagina=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor;

                $this->renderNextPageLink();
                ?>
                
            </ul>
        </nav>
    <?php
    }

}