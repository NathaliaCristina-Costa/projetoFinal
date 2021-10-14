<?php
    require_once 'Conexao.php';
    class Pedido{
        public $id;
        public $cep;
        public $rua;
        public $bairro;
        public $cidade;
        public $estado;               
        public $telefone; 
        public $mensagem;  
        public $idCategoria;       
        public $idCliente; 
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        public function buscarCategoria(){

            $cmd = $this->pdo->prepare("SELECT nomeCategoria, id_Categoria FROM categoria");
            $cmd->execute();

            $cmd->execute();

            if ($cmd->rowCount()>0) {
                while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$dados['id_Categoria']}'>{$dados['nomeCategoria']}</option>";
                }
            }
        }


        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarPedido($cep, $rua, $bairro,$cidade, $estado, $telefone,$mensagem, $idCategoria, $idCliente){
      
             $cmd = $this->pdo->prepare("INSERT INTO pedido (cep, rua, bairro, cidade, estado, telefone,mensagem, idCategoria, idCliente) VALUES ( :cep, :r, :b,:c,:e, :t,:m, :idC, :idCl)");

             
             $cmd->bindValue(":cep", $cep);
             $cmd->bindValue(":r", $rua);
             $cmd->bindValue(":b", $bairro);
             $cmd->bindValue(":c", $cidade);
             $cmd->bindValue(":e", $estado);               
             $cmd->bindValue(":t", $telefone); 
             $cmd->bindValue(":m", $mensagem);  
             $cmd->bindValue(":idC", $idCategoria);       
             $cmd->bindValue(":idCl", $idCliente); 

             $cmd->execute();
              
                
               
            
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->prepare("SELECT nomeCliente, nomeCategoria,telefone, cidade, estado  FROM pedido 
            JOIN cliente ON idCliente = id_Cliente JOIN categoria ON idCategoria = id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function pedidosCliente($id){
            
            
            $cmd = $this->pdo->prepare("SELECT nomeCategoria, dataPedido, idFreelancer FROM pedido 
            JOIN categoria ON idCategoria = id_Categoria WHERE idCliente = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            if ($cmd->rowCount()>0) {                  
                    while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                        
                        echo "
                            <div class='card'>
                                <div class='card-header'>
                                    <h5 class='mb-0'>
                                        <span style='float:left'>
                                            <b>Solicitação:</b> <i>{$dados['nomeCategoria']}</i>
                                        </span>
                                        <span style='float:right'>
                                            <b>Data Solicitação:</b> <i>{$dados['dataPedido']}</i>
                                        </span>
                                    </h5>
                                </div>
                            
                            <br>";
                    
                    if ($dados['idFreelancer'] != 0) {
                        echo"
                                <div class='card-body'>
                                    {$dados['idFreelancer']}
                                </div>
                            </div>
                            <br>";
                    }else{
                        echo"   <div class='card-body'>
                                    Nenhum Profissional
                                </div>
                            </div>
                            <br>";
                    }
                }
                    
            }
                      
            
            
        }

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroPedido(){
            
            $res = array();
            $cmd = $this->pdo->prepare("SELECT * FROM pedido");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

      

        
    }
   
?>



            