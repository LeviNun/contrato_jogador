<?php
require 'vendor/autoload.php';

use App\ContratoGenerator;

// Classe Jogador (simplificada)
class Jogador {
    public $nome;
    public $nacionalidade;
    public $idade;
    public $salario;

    public function __construct($nome, $nacionalidade, $idade, $salario) {
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->idade = $idade;
        $this->salario = $salario;
    }
}

$jogador = new Jogador("Levi Nunes", "Brasileiro", 18, 15000);

$gerador = new ContratoGenerator();

$gerador->gerar(
    $jogador,
    "Clube Flamengo",
    "33.000.167/0001-01",
    "Rua Paissandu, 48 - Flamengo, Rio de Janeiro - RJ, 22210-060",
    12,
    "01/07/2025",
    "30/06/2026",
    3,
    "Rio de Janeiro",
    "0001/2025",
    date('d/m/Y'),
    __DIR__ . "/public/img/flamengo-15.png"
);
