<?php

class JoinTable{

    private $nomiCampi;
    private $righe;

    public function __construct(array $righe) {
         //Otteniamo l'array associativo dei nomi dei campi da cui è composto l'array di righe
         $this->nomiCampi = array_keys($righe[0]);
         $this->righe = $righe;
    }

    public function renderTable(): void{
            ?>
             <table class="table">

            <thead>
                <tr>
                <?php foreach($this->nomiCampi as $campo ):?>
                    <th><?=$campo?></th>
                <?php endforeach;?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->righe as $riga):?>
                    <tr>
                        <?php foreach($riga as $campo):?>
                            <td><?=$campo?></td>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
            </tbody>
               
            </table>
        <?php
    }

}