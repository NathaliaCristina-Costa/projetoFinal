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

        //Buscar Categorias para TELA PEDIDO
        public function buscarCategoria(){

            $cmd = $this->pdo->prepare("SELECT nomeCategoria, id_Categoria FROM categoria");
            $cmd->execute();

            if ($cmd->rowCount()>0) {
                while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$dados['id_Categoria']}'>{$dados['nomeCategoria']}</option>";
                }
            }
        }


        //FUNÇÃO CADASTRAR PEDIDOS NO BANCO DE DADOS
        public function cadastrarPedido($cep, $rua, $bairro,$cidade, $estado, $telefone,$mensagem, $idCategoria, $idCliente){
      
             $cmd = $this->pdo->prepare("INSERT INTO pedido (cep, rua, bairro, cidade, estado, telefone,mensagem, idCat, idCliente) VALUES ( :cep, :r, :b,:c,:e, :t,:m, :idC, :idCl)");

             
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
            $cmd = $this->pdo->query("SELECT nomeCliente, nomeCategoria, telefone, cidade, estado FROM pedido 
            JOIN cliente ON idCliente = id_Cliente
            JOIN categoria ON idCat = id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //LISTAR OS PEDIDOS DO CLIENTE ESPECÍFICO
        public function pedidosCliente($id){
            
            
            $cmd = $this->pdo->prepare("SELECT id_Pedido,nomeCategoria, dataPedido, idFreelancer FROM pedido 
            JOIN categoria ON idCat = id_Categoria WHERE idCliente = :id");
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
                    
                    if ($dados['idFreelancer'] != "") {
                        echo"
                                <div class='card-body'>
                                    {$dados['idFreelancer']}
                                    
                                </div>
                            </div>
                        <br>";
                    }
                    else if ($dados['idFreelancer'] == ""){
                        echo"   <div class='card-body'>
                                    Nenhum Profissional    
                                    <a href='excluirPedido.php?id={$dados['id_Pedido']}' >
                                        <button style='float:right' type='button' class='btn btn-danger'>
                                            <i class='fas fa-trash-alt'></i>
                                        </button>
                                    </a>                                
                                </div>
                            </div>
                        <br>";
                    }
                }
            }
        }

        //TOTAL DE PEDIDOS REGISTRADAS
        public function totalRegistroPedido(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM pedido");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        //TOTAL DE PEDIDOS POR CATEGORIA
        public function totalPedidosPorCategoria($id){
            $res = array();
            $cmd = $this->pdo->prepare("SELECT id_Pedido FROM pedido JOIN freelancer ON idCategoria = idCat WHERE idCategoria = :id");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $res;
        }

        // EXLCUIR PEDIDOS
        public function excluirPedido($id){
            $cmd = $this->pdo->prepare("DELETE FROM pedido WHERE id_Pedido = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }
        
    }
   
?>



            