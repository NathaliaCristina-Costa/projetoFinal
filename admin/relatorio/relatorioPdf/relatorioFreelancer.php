<?php        
    require_once "../../../dompdf/autoload.inc.php";

    use Dompdf\Dompdf;
    use Dompdf\Options;

    
    $options = new Options();

    $pdf = new DOMPDF($options);

    $pdo = new PDO('mysql:host=localhost; dbname=projetofinal', 'root', '');

    $sql = $pdo->query('SELECT  nome, email, telefone, nomeCategoria, cpf, cidade, uf, dataCad 
	FROM freelancer 
	JOIN categoria ON idCategoria = id_Categoria ');

    $html = '<table border=1 width=90%>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Email</th>';
	$html .= '<th>Telefone</th>';
	$html .= '<th>Categoria</th>';
	$html .= '<th>CPF</th>';
	$html .= '<th>Cidade</th>';
	$html .= '<th>Estado</th>';
	$html .= '<th>Data Cadastro</th>';
	$html .= '</thead>';
	$html .= '<tbody>';

    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<tr><td>'. $linha['nome'] . '</td>';
		$html .= '<td>'. $linha['email'] . '</td>';
		$html .= '<td>'. $linha['telefone'] . '</td>';
		$html .= '<td>'. $linha['nomeCategoria'] . '</td>';
		$html .= '<td>'. $linha['cpf'] . '</td>';
		$html .= '<td>'. $linha['cidade'] . '</td>';
		$html .= '<td>'. $linha['uf'] . '</td>';
        $html .= '<td>'. $linha['dataCad'] . '</td></tr>';
        
    }

    $html .= '</tbody>';
	$html .= '</table>';

    //Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->loadHtml('
			<h1 style="text-align: center;"> Relatório Freelancer</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorioFreelancer.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
    
?>