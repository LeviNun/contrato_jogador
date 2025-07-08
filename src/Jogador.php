<?php
namespace App;

class Jogador {
    public $nome;
    public $idade;
    public $nacionalidade;
    public $time;
    public $salario;

    public function __construct($nome, $idade, $nacionalidade, $time, $salario) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->nacionalidade = $nacionalidade;
        $this->time = $time;
        $this->salario = $salario;
    }
}
