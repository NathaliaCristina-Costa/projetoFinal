<?php
    require_once 'Conexao.php';
    class Pedido{
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
            $cmd = $this->pdo->query("SELECT nomeCliente, nomeCategoria,telefone, cidade, estado  FROM pedido 
            JOIN cliente ON idCliente = id_Cliente JOIN categoria ON idCategoria = id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        
       

       

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroPedido(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM pedido");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

      

        
    }
   
?>



            