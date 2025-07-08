<?php
require_once __DIR__ . '/src/ContratoGenerator.php';
require_once __DIR__ . '/src/Jogador.php';

use App\ContratoGenerator;
use App\Jogador;

// Cria o objeto jogador
$jogador = new Jogador(
    $_POST['nome'],
    $_POST['idade'],
    $_POST['nacionalidade'],
    $_POST['time'],
    $_POST['salario']
);

// Cria e chama o gerador
$gerador = new ContratoGenerator();
$gerador->gerar(
    $jogador,
    $_POST['clubeNome'],
    $_POST['clubeCNPJ'],
    $_POST['clubeEndereco'],
    $_POST['prazoMeses'],
    $_POST['dataInicio'],
    $_POST['dataFim'],
    $_POST['multiploClausula'],
    $_POST['cidadeForo'],
    $_POST['numeroContrato'],
    $_POST['dataContrato'],
    __DIR__ . '/' . $_POST['caminhoLogo'] // Exemplo: public/img/flamengo.png
);
