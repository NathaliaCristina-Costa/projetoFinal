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
      
             $cmd = $this->pdo->prepare("INSERT INTO pedido (cepPedido, ruaPedido, bairroPedido, 
             cidadePedido, estadoPedido, telefonePedido,mensagemPedido, idCat, idCliente)
             VALUES ( :cep, :r, :b,:c,:e, :t,:m, :idC, :idCl)");

             
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
            $cmd = $this->pdo->query("SELECT nomeCliente, nomeCategoria, telefonePedido, cidadePedido, estadoPedido FROM pedido 
            JOIN cliente ON idCliente = id_Cliente
            JOIN categoria ON idCat = id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

       

        //LISTAR PEDIDOS DISPONÍVEL DE ACORDO COM A CATEGORIA DO FREELANCER LOGADO
        public function pedidosFreelancer($id){
            
            
            $cmd = $this->pdo->prepare("SELECT nomeCliente,nomeCategoria,telefonePedido,cidadePedido,mensagemPedido, estadoPedido FROM `pedido` 
            JOIN cliente ON idCliente = id_Cliente 
            JOIN categoria ON idCat = id_Categoria 
            JOIN freelancer ON idCat = idCategoria 
            WHERE idCat = idCategoria
            AND id_Freelancer = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            if ($cmd->rowCount()>0) {                  
                    while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                        
                        echo "
                            <div class='card'>
                                <div class='card-header'>
                                    <h5 class='mb-0'>
                                        <span style='float:left'> 
                                            <i>{$dados['nomeCliente']}</i>
                                        </span>
                                        <br>
                                        <p>{$dados['cidadePedido']} - {$dados['estadoPedido']}</p>
                                        
                                    </h5>
                                </div>
                                <div class='card-body'>
                                  <b>{$dados['nomeCategoria']}</b><br>
                                  {$dados['mensagemPedido']}
                                  
                                </div>
                            </div>
                            
                        <br>";
                    }
                }
        }
        
            
        //LISTAR OS PEDIDOS DO CLIENTE ESPECÍFICO
        public function pedidosCliente($id){
            
            
            $cmd = $this->pdo->prepare("SELECT id_Pedido,nomeCategoria, dataPedido, idFreelancer, nome,telefone, cidade, uf
            FROM pedido
            INNER JOIN categoria
            ON idCat = id_Categoria
            LEFT JOIN freelancer
            ON idFreelancer = id_Freelancer 
            WHERE idCliente = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            if ($cmd->rowCount()>0) {                  
                    while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                        if($dados['idFreelancer'] != ""){
                            echo"
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
                                <div class='card-body'>
                                    <b>Profissional:</b><br>
                                    <i>{$dados['nome']}<br>
                                    {$dados['telefone']}<br>
                                    {$dados['cidade']} - {$dados['uf']}</i><br><br> 
                                    <hr> 
                                    <a href='' >
                                        Realizado
                                        <button type='button' class='btn btn-success'>
                                            <i class='fas fa-check-circle'></i>
                                        </button>
                                    </a>
                                    <a>
                                        Não-Realizado
                                        <button type='button' class='btn btn-danger'>
                                            <i class='fas fa-times-circle'></i>
                                        </button>
                                    </a>                             
                                </div>
                                
                            </div>
                            <br>";
                        }else{
                            echo"
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
                                <div class='card-body'>
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

        
        // EXLCUIR PEDIDOS
        public function excluirPedido($id){
            $cmd = $this->pdo->prepare("DELETE FROM pedido WHERE id_Pedido = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }
        
    }
   
?>



            