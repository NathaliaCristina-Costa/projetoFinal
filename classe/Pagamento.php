<?php
    require_once 'Conexao.php';
    class Pagamento{
        public $id;
        public $primeiroNome;
        public $ultimoNome;
        public $cpf;               
        public $telefone; 
        public $email;
        public $idFr;
        public $idProduto;       
        public $dataCompra;
        public $dataFinal; 
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        public function buscarDados($dtInicio, $dtFim){
            $cmd = $this->pdo->prepare("SELECT id_Pagamento, primeiroNome, ultimoNome, cpf, nomeProduto, dataCompra, dataFinal 
            FROM pagamento 
            JOIN produto ON idProduto = id_Produto
            WHERE dataCompra BETWEEN :inicio AND :final");
            $cmd->bindValue(":inicio", $dtInicio);
            $cmd->bindValue(":final", $dtFim);
            $cmd->execute();

            if($cmd->rowCount()>0){
                while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$dados['id_Pagamento']}</td>
                            <td>{$dados['primeiroNome']}</td>
                            <td>{$dados['ultimoNome']}</td>
                            <td>{$dados['cpf']}</td>
                            <td>{$dados['nomeProduto']}</td>
                            <td>{$dados['dataCompra']}</td>
                            <td>{$dados['dataFinal']}</td>
                          </tr>";
                }
            }
        }

        //FUNÇÃO CADASTRAR PAGAMENTOS NO BANCO DE DADOS
        public function cadastrarPagamento($primeiroNome, $ultimoNome, $cpf, $telefone, $email, $idProduto, $idFr){
      
             $cmd = $this->pdo->prepare("INSERT INTO pagamento (primeiroNome, ultimoNome, cpf, 
             telefone, email, idProduto, idFr,  dataFinal)
             VALUES ( :p, :u, :c, :t, :e, :idP, :idF");

             
             $cmd->bindValue(":p", $primeiroNome);
             $cmd->bindValue(":u", $ultimoNome);
             $cmd->bindValue(":c", $cpf);
             $cmd->bindValue(":t", $telefone);               
             $cmd->bindValue(":e", $email); 
             $cmd->bindValue(":idP", $idProduto);
             $cmd->bindValue(":idF", $idFr);
        
             $cmd->execute();               
            
        }    
        
        public function dataFinal($id){
            $cmd = $this->pdo->prepare("SELECT * FROM pagamento 
            JOIN freelancer ON idFr = id_Freelancer 
            JOIN produto ON idProduto = id_Produto
            WHERE idFr = :idF");
            $cmd->bindValue(":idF", $id);
            $cmd->execute();
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            if($dados['idProduto'] == 1){
                $cmd = $this->pdo->prepare("UPDATE pagamento SET dataFinal = NOW()+INTERVAL 120 DAY WHERE idFr = :idF");
                $cmd->bindValue(":idF", $id);

                $cmd->execute();           


                echo"<div class='card text-center'>
                        <div class='card-header'>
                            <b>Plano: </b>{$dados['nomeProduto']}
                        </div>
                        <div class='card-body'>
                            <b>Data Final: </b>{$dados['dataFinal']}
                        </div>
                    </div>";
            }elseif($dados['idProduto'] == 2){
                $cmd = $this->pdo->prepare("UPDATE pagamento SET dataFinal = NOW()+INTERVAL 180 DAY WHERE idFr = :idF");
                $cmd->bindValue(":idF", $id);

                $cmd->execute();
                

                echo"<div class='card text-center'>
                        <div class='card-header'>
                            <b>Plano: </b>{$dados['nomeProduto']}
                        </div>
                        <div class='card-body'>
                            <b>Data Final: </b>{$dados['dataFinal']}
                        </div>
                    </div>";
            }elseif($dados['idProduto'] == 3){
                $cmd = $this->pdo->prepare("UPDATE pagamento SET dataFinal = NOW()+INTERVAL 365 DAY WHERE idFr = :idF");
                $cmd->bindValue(":idF", $id);

                $cmd->execute();
              

                echo"<div class='card text-center'>
                        <div class='card-header'>
                            <b>Plano: </b>{$dados['nomeProduto']}
                        </div>
                        <div class='card-body'>
                            <b>Data Final: </b>{$dados['dataFinal']}
                        </div>
                    </div>";
            }
        }

        public function restricaoAcesso($id){
            $cmd = $this->pdo->prepare("SELECT * FROM pagamento JOIN freelancer ON idFr = id_Freelancer WHERE idFr = :idF");
            $cmd->bindValue(":idF", $id);
            $cmd->fetch(PDO::FETCH_ASSOC);
            $cmd->execute();
            

            if($cmd->rowCount()>0){
                echo "<li>
                        <a href='pedidoDisponivel.php'><i class='fas fa-receipt mr-2 text-gray-400'></i> Pedidos Disponíveis</a>
                      </li>
                     <li>
                        <a href='meusPedidos.php'><i class='fas fa-dollar-sign mr-2 text-gray-400'></i> Meus Pedidos</a>
                     </li>";
            }else{
                echo "<li>                        
                        <a href='pagamento/index.php'><i class='fas fa-dollar-sign mr-2 text-gray-400'></i> PAGAMENTO PARA LIBERAÇÃO DOS PEDIDOS</a>
                     </li>";
            }
        }
      
    }
   
?>



            