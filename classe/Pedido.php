<?php
    require_once 'Conexao.php';
    class Pedido{
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT 'pedido.id_Pedido', 'cliente.nomecliente'
            FROM PEDIDO JOIN CLIENTE
            ON 'PEDIDO.id_Cliente' = 'CLIENTE.id_Cliente';");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
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
        public function cadastrarPedido($cep, $rua, $bairro,$cidade, $estado, $telefone,$mensagem, $id_Categoria){
      
             $cmd = $this->pdo->prepare("INSERT INTO pedido (cep, rua, bairro, cidade, estado, telefone,mensagem, id_Categoria) VALUES ( :cep, :r, :b,:c,:e, :t,:m, :idC)");

             
             $cmd->bindValue(":cep", $cep);
             $cmd->bindValue(":r", $rua);
             $cmd->bindValue(":b", $bairro);
             $cmd->bindValue(":c", $cidade);
             $cmd->bindValue(":e", $estado);               
             $cmd->bindValue(":t", $telefone); 
             $cmd->bindValue(":m", $mensagem);  
             $cmd->bindValue(":idC", $id_Categoria);           
             
             $cmd->execute();
              
                
               
            
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



            