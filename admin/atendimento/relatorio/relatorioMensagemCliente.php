<?php        
    require_once "../../../dompdf/autoload.inc.php";

    use Dompdf\Dompdf;
    use Dompdf\Options;

    
    $options = new Options();

    $pdf = new DOMPDF($options);

    $pdo = new PDO('mysql:host=localhost; dbname=projetofinal', 'root', '');

    $sql = $pdo->query("SELECT  assunto,mensagem, dataMensagem, nomeCliente FROM atendimentocliente JOIN cliente ON idCliente = id_Cliente; ");

    $html = '<table border=1 width=100%>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Assunto</th>';
	$html .= '<th>Mensagem</th>';
    $html .= '<th>Data Registro</th>';
    $html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
       
		$html .= '<tr><td>'. $linha['nomeCliente'] . '</td>';
		$html .= '<td>'. $linha['assunto'] . '</td>';
		$html .= '<td>'. $linha['mensagem'] . '</td>';
        $html .= '<td>'. $linha['dataMensagem'] . '</td></tr>';
        
    }

    $html .= '</tbody>';
	$html .= '</table>';

    //Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->loadHtml('
			<h1 style="text-align: center;"> Relatório Mensagens Clientes</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorioMensagemCliente.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);


	
    
?>