<?php
// contrato.php - template do contrato

// Variáveis definidas antes: $numeroContrato, $dataContrato, $clubeNome, $clubeCNPJ, $clubeEndereco,
// $jogador (objeto), $prazoMeses, $dataInicio, $dataFim, $multiploClausula, $cidadeForo, $logoBase64
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style>
  @page { margin: 50px; }
  body {
    font-family: 'Arial', sans-serif;
    font-size: 12pt;
    line-height: 1.6;
    margin: 0;
    position: relative;
    color: #000;
    border: 1px solid #ccc;
    padding: 50px;
  }
  #marca-dagua {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 300px;
    height: 300px;
    background-image: url('<?= $logoBase64 ?>');
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    opacity: 0.07;
    transform: translate(-50%, -50%);
    z-index: 0;
  }
  header {
    text-align: center;
    margin-bottom: 30px;
    position: relative;
    z-index: 1;
  }
  .logo {
    width: 100px;
    height: auto;
    margin-bottom: 10px;
  }
  h1 {
    font-size: 18pt;
    text-transform: uppercase;
    margin: 10px 0;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    position: relative;
    z-index: 1;
  }
  .header-info {
    font-size: 10pt;
    position: absolute;
    top: 10px;
    right: 50px;
    text-align: right;
    color: #666;
    z-index: 2;
  }
  p {
    text-align: justify;
    margin: 10px 0;
    position: relative;
    z-index: 1;
  }
  .clausula {
    margin-top: 20px;
    position: relative;
    z-index: 1;
  }
  .clausula strong {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }
  footer {
    margin-top: 60px;
    position: relative;
    z-index: 1;
  }
  .assinatura {
    display: inline-block;
    width: 45%;
    text-align: center;
    margin-top: 80px;
  }
  .testemunhas {
    margin-top: 40px;
  }
</style>
</head>
<body>
  <div id="marca-dagua"></div>

  <div class="header-info">
    <div>Número do Contrato: <?= htmlspecialchars($numeroContrato) ?></div>
    <div>Data: <?= htmlspecialchars($dataContrato) ?></div>
  </div>

  <header>
    <img src="<?= $logoBase64 ?>" class="logo" alt="Escudo Flamengo">
    <h1>Contrato Especial de Trabalho Desportivo</h1>
  </header>

  <p>
    Pelo presente instrumento particular, de um lado, o <strong>Clube de Regatas do Flamengo</strong>, pessoa jurídica de direito privado, inscrito no CNPJ sob o nº <?= htmlspecialchars($clubeCNPJ) ?>, com sede à <?= htmlspecialchars($clubeEndereco) ?>, neste ato representado na forma de seu estatuto social, doravante denominado simplesmente CLUBE; e de outro lado, o ATLETA <?= htmlspecialchars($jogador->nome) ?>, <?= htmlspecialchars($jogador->nacionalidade) ?>, nascido em <?= htmlspecialchars($jogador->idade) ?> anos, portador dos documentos pessoais necessários, resolvem celebrar o presente Contrato de Trabalho Desportivo, que será regido pelas cláusulas e condições a seguir:
  </p>

  <div class="clausula">
    <strong>Cláusula 1ª – Objeto</strong>
    O presente contrato tem por objeto a prestação dos serviços profissionais do ATLETA na prática de futebol, sob a exclusividade do CLUBE, pelo prazo estabelecido neste instrumento.
  </div>

  <div class="clausula">
    <strong>Cláusula 2ª – Remuneração</strong>
    O CLUBE pagará ao ATLETA salário mensal líquido no valor de R$ <?= number_format($jogador->salario, 2, ',', '.') ?> (<?= extenso($jogador->salario) ?>), até o quinto dia útil do mês subsequente, além de eventuais bonificações e premiações previstas em regulamento próprio.
  </div>

  <div class="clausula">
    <strong>Cláusula 3ª – Vigência</strong>
    O presente contrato terá duração de <?= htmlspecialchars($prazoMeses) ?> meses, com início em <?= htmlspecialchars($dataInicio) ?> e término em <?= htmlspecialchars($dataFim) ?>, podendo ser renovado mediante acordo entre as partes.
  </div>

  <div class="clausula">
    <strong>Cláusula 4ª – Cláusula Penal</strong>
    A rescisão unilateral e imotivada por qualquer das partes sujeitará o infrator ao pagamento de multa correspondente a <?= htmlspecialchars($multiploClausula) ?> vezes o salário mensal, conforme legislação vigente.
  </div>

  <div class="clausula">
    <strong>Cláusula 5ª – Obrigações do Atleta</strong>
    O ATLETA compromete-se a cumprir os regulamentos internos do CLUBE, participar de treinos e competições, preservar sua forma física, zelar pela imagem do CLUBE e observar as normas disciplinares aplicáveis.
  </div>

  <div class="clausula">
    <strong>Cláusula 6ª – Foro</strong>
    Fica eleito o foro da comarca de <?= htmlspecialchars($cidadeForo) ?> para dirimir quaisquer questões oriundas deste contrato.
  </div>

  <footer>
    <div class="assinatura">
      _______________________________<br>
      Representante do Clube
    </div>
    <div class="assinatura">
      _______________________________<br>
      Atleta: <?= htmlspecialchars($jogador->nome) ?>
    </div>

    <div class="testemunhas">
      <p>Testemunhas:</p>
      <p>1. _______________________________</p>
      <p>2. _______________________________</p>
    </div>
  </footer>
</body>
</html>

<?php
// Função para converter valor numérico para extenso (exemplo simples para até milhares)
function extenso($valor) {
    $singular = ["centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão"];
    $plural = ["centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões"];

    $valor = number_format($valor, 2, '.', '');
    $inteiro = explode('.', $valor)[0];
    $decimal = explode('.', $valor)[1];

    $extenso = "";

    // Pra facilitar, só escreve o valor numérico por extenso parcial:
    if ($inteiro > 0) {
        $extenso .= numberToWords($inteiro) . " " . ($inteiro > 1 ? $plural[1] : $singular[1]);
    }
    if ($decimal > 0) {
        if ($extenso != "") $extenso .= " e ";
        $extenso .= numberToWords($decimal) . " " . ($decimal > 1 ? $plural[0] : $singular[0]);
    }
    return $extenso;
}

function numberToWords($number) {
    // Implemente uma função simples ou use uma biblioteca para converter números em palavras em português
    // Para não alongar aqui, vou deixar simples para 0-20
    $words = [
        0 => 'zero', 1 => 'um', 2 => 'dois', 3 => 'três', 4 => 'quatro', 5 => 'cinco',
        6 => 'seis', 7 => 'sete', 8 => 'oito', 9 => 'nove', 10 => 'dez', 11 => 'onze',
        12 => 'doze', 13 => 'treze', 14 => 'quatorze', 15 => 'quinze', 16 => 'dezesseis',
        17 => 'dezessete', 18 => 'dezoito', 19 => 'dezenove', 20 => 'vinte'
    ];
    return $words[(int)$number] ?? $number;
}
?>
