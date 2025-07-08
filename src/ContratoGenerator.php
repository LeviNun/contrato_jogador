<?php
namespace App;

use Dompdf\Dompdf;
use Dompdf\Options;

class ContratoGenerator
{
    public function gerar(
        $jogador,
        string $clubeNome,
        string $clubeCNPJ,
        string $clubeEndereco,
        int $prazoMeses,
        string $dataInicio,
        string $dataFim,
        int $multiploClausula,
        string $cidadeForo,
        string $numeroContrato,
        string $dataContrato,
        string $caminhoLogo
    ) {
        // Configurações do Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Converte imagem da logo para base64
        if (!file_exists($caminhoLogo)) {
            throw new \Exception("Logo não encontrada em: " . $caminhoLogo);
        }
        $imgData = base64_encode(file_get_contents($caminhoLogo));
        $logoBase64 = 'data:image/png;base64,' . $imgData;

        // Variáveis do template
        $clubeNome = $clubeNome;
        $clubeCNPJ = $clubeCNPJ;
        $clubeEndereco = $clubeEndereco;
        $prazoMeses = $prazoMeses;
        $dataInicio = $dataInicio;
        $dataFim = $dataFim;
        $multiploClausula = $multiploClausula;
        $cidadeForo = $cidadeForo;
        $numeroContrato = $numeroContrato;
        $dataContrato = $dataContrato;
        $logoBase64 = $logoBase64;

        // Captura o HTML do contrato
        ob_start();
        include __DIR__ . '/contrato.php'; // ajuste o caminho se necessário
        $html = ob_get_clean();

        // Gera o PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Exibe no navegador
        $dompdf->stream("Contrato_{$jogador->nome}.pdf", ["Attachment" => false]);
    }
}
