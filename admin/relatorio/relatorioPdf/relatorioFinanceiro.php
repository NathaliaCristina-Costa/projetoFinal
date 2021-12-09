<?php        
    require_once "../../../dompdf/autoload.inc.php";

    use Dompdf\Dompdf;
    use Dompdf\Options;

    
    $options = new Options();

    $pdf = new DOMPDF($options);

    $pdo = new PDO('mysql:host=localhost; dbname=projetofinal', 'root', '');

    $sql = $pdo->query('SELECT primeiroNome, ultimoNome, cpf, nomeProduto, dataCompra, dataFinal 
	FROM pagamento 
	JOIN produto ON idProduto = id_Produto');

    $html = '<table border=1 width=100%>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Primeiro Nome</th>';
	$html .= '<th>Ultimo Nome</th>';
	$html .= '<th>CPF</th>';
	$html .= '<th>Plano</th>';
	$html .= '<th>Data Compra</th>';
	$html .= '<th>Data Final</th>';
	$html .= '</thead>';
	$html .= '<tbody>';

    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<tr><td>'. $linha['primeiroNome'] . '</td>';
		$html .= '<td>'. $linha['ultimoNome'] . '</td>';
		$html .= '<td>'. $linha['cpf'] . '</td>';
		$html .= '<td>'. $linha['nomeProduto'] . '</td>';
		$html .= '<td>'. $linha['dataCompra'] . '</td>';
        $html .= '<td>'. $linha['dataFinal'] . '</td></tr>';
        
    }

    $html .= '</tbody>';
	$html .= '</table>';

    //Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->loadHtml('
			<h1 style="text-align: center;"> Relatório Financeiro</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorioCategoria.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
    
?>