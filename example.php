<?php

    require __DIR__ . '/src/mycep-br/BuscaCEP.php';


    $cep = new BuscaCEP();
    $dadosCEP = $cep->find('08295-005');

    foreach ($dadosCEP as $campo => $valor){
        echo "{$campo}: $valor <br />";
    }