<?php        
    require_once "../../../dompdf/autoload.inc.php";

    use Dompdf\Dompdf;
    use Dompdf\Options;

    
    $options = new Options();

    $pdf = new DOMPDF($options);

    $pdo = new PDO('mysql:host=localhost; dbname=projetofinal', 'root', '');

    $sql = $pdo->query('SELECT * FROM categoria');

    $html = '<table border=1 width=100%>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Categoria</th>';
	$html .= '</thead>';
	$html .= '<tbody>';

    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<tr><td>'. $linha['id_Categoria'] . '</td>';
        $html .= '<td>'. $linha['nomeCategoria'] . '</td></tr>';
        
    }

    $html .= '</tbody>';
	$html .= '</table>';

    //Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->loadHtml('
			<h1 style="text-align: center;"> Relatório Categorias</h1>
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