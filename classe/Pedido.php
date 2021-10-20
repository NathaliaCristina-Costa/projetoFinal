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
        public $status;
        public $idCategoria;       
        public $idCliente;
        public $idFreelancer; 
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

        //PEDIDO ACEITO PELO FREELANCER
        public function statusPedido($id, $status, $idFreelancer){
            $cmd = $this->pdo->prepare("SELECT id_Pedido FROM pedido WHERE statusPedido = :sp AND idFreelancer = :idF");
            $cmd->bindValue(":sp", $status);
            $cmd->bindValue(":idF", $idFreelancer);
            $cmd->execute();

            //Se rowCount for > 0 é pq Categoria já existe no banco de dados então retorna falso
            if($cmd->rowCount()>0){
                return false;
            }else{ 

                $cmd = $this->pdo->prepare("UPDATE pedido SET statusPedido = :sp, idFreelancer = :idF WHERE id_Pedido = :id");
                $cmd->bindValue(":sp", $status);
                $cmd->bindValue(":idF", $idFreelancer);
                $cmd->bindValue(":id", $id);

                $cmd->execute();
                return true;
            }
        }
        //LISTAR PEDIDOS DISPONÍVEL DE ACORDO COM A CATEGORIA DO FREELANCER LOGADO
        public function pedidosDisponiveisFreelancer($id){
            
            
            $cmd = $this->pdo->prepare("SELECT id_Pedido,nomeCliente,nomeCategoria,telefonePedido,cidadePedido,estadoPedido,
            ruaPedido, bairroPedido,mensagemPedido,statusPedido  FROM `pedido` 
            JOIN cliente ON idCliente = id_Cliente 
            JOIN categoria ON idCat = id_Categoria 
            JOIN freelancer ON idCat = idCategoria 
            WHERE idCat = idCategoria
            AND id_Freelancer = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            if ($cmd->rowCount()>0) {                  
                    while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                        if ($dados['statusPedido'] != "Aceito") {
                            echo "
                            <div class='card'>
                                <div class='card-header'>
                                    <h5 class='mb-0'>
                                        <span style='float:left'> 
                                            <i>{$dados['nomeCliente']}</i>
                                        </span>
                                        <br>
                                        <p>{$dados['ruaPedido']}, {$dados['bairroPedido']}. {$dados['cidadePedido']} - {$dados['estadoPedido']}</p>
                                         
                                    </h5>
                                    <a href='https://api.whatsapp.com/send?phone=
                                        55{$dados['telefonePedido']}&text=Olá {$dados['nomeCliente']},estou aqui pelo seu pedido na plataforma!'>
                                          <button type='button' class='btn btn-success'>
                                              <i class='fa fa-phone'></i>
                                          </button>
                                    </a>
                                        {$dados['telefonePedido']} 
                                </div>
                                <div class='card-body'>
                                  <b>{$dados['nomeCategoria']}</b><br>
                                  {$dados['mensagemPedido']}
                                  <hr>
                                  <form method='POST' action='statusPedido.php?id={$dados['id_Pedido']}'>
                                    
                                        <button type='submit' class='btn btn-primary'>
                                        <i class='fas fa-check-circle'></i>
                                        </button>                             
                                        <select name='status'>
                                            <option>Aceitar Pedido ?</option>
                                            <option value='Aceito'>Sim</option>
                                        </select>  
                                    <input type='hidden' name='idFreelancer' value='{$_SESSION['id_Freelancer']}'>                                  
                                  </form>                              
                                </div>              
                            </div>
                            
                            <br>";
                        }                        
                    }
                }
        }

        //LISTAR PEDIDOS DE CADA FREELANCER
        public function meusPedidosFreelancer($id){
            
            
            $cmd = $this->pdo->prepare("SELECT id_Pedido, nomeCliente, telefonePedido, mensagemPedido, cidadePedido, estadoPedido, nomeCategoria FROM pedido 
            JOIN categoria ON idCat = id_Categoria
            JOIN cliente ON idCliente = id_Cliente
            WHERE idFreelancer = :id");
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
                                  <hr> 
                                  <form method='POST'>
                                    
                                        <button type='submit' class='btn btn-success'>
                                        <i class='fas fa-check-circle'></i>
                                        </button>                             
                                        <select name='status'>
                                            <option value='Realizado'>Pedido Foi Finalizado ?</option>
                                            <option value='Realizado'>Sim</option>
                                            <option value='Não Realizado'>Não</option>
                                        </select>  
                                        <input type='hidden' name='idFreelancer' value='{$_SESSION['id_Freelancer']}'>                                  
                                  </form>              
                                </div>
                            </div>
                            
                        <br>";
                    }
                }
        }
        
            
        //LISTAR OS PEDIDOS DO CLIENTE ESPECÍFICO
        public function pedidosCliente($id){
            
            
            $cmd = $this->pdo->prepare("SELECT id_Pedido,nomeCategoria, dataPedido, idFreelancer, nome,telefone, cidade, uf, statusPedido
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
                                    <i><b>Status do Pedido:</b></i> {$dados['statusPedido']}                     
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
                                    <hr>
                                    <i><b>Status do Pedido:</b></i> Pendente
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



            