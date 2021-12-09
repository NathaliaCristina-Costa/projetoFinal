<?php        
    require_once "../../../dompdf/autoload.inc.php";

    use Dompdf\Dompdf;
    use Dompdf\Options;

    
    $options = new Options();

    $pdf = new DOMPDF($options);

    $pdo = new PDO('mysql:host=localhost; dbname=projetofinal', 'root', '');

    $sql = $pdo->query('SELECT  nomeCliente, emailCliente, telefoneCliente, dataCadastro 
	FROM cliente');

    $html = '<table border=1 width=100%>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Email</th>';
	$html .= '<th>Telefone</th>';
	$html .= '<th>Data Cadastro</th>';
	$html .= '</thead>';
	$html .= '<tbody>';

    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<tr><td>'. $linha['nomeCliente'] . '</td>';
		$html .= '<td>'. $linha['emailCliente'] . '</td>';
		$html .= '<td>'. $linha['telefoneCliente'] . '</td>';
        $html .= '<td>'. $linha['dataCadastro'] . '</td></tr>';
        
    }

    $html .= '</tbody>';
	$html .= '</table>';

    //Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->loadHtml('
			<h1 style="text-align: center;"> Relatório Clientes Cadastrados no Site</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorioCliente.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
    
?>