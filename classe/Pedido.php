<?php

    class Pedido{
        private $pdo;
        
        //CONEXAO BANCO DE DADOS
        public function __construct($dbname, $host, $user, $senha){
            try {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            } catch (PDOException $e) {
                echo "Erro com banco de dados: ".$e->getMessage();
            } catch (Exception $e) {
                echo "Erro generico: ".$e->getMessage();
            }
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT id_Cliente, id_Categoria FROM pedido ORDER BY id_Pedido ");
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
        public function cadastrarPedido($cep, $estado, $cidade,$rua,$bairro,$telefone,$mensagem, $id_Categoria){
            
                $cmd = $this->pdo->prepare("INSERT INTO pedido (cep, estado, cidade, rua, bairro, telefone, mensagem) VALUES (:cep, :e, :c,:r, :t,:m, :idC)");

                $cmd->bindValue(":cep", $cep);
                $cmd->bindValue(":e", $estado);
                $cmd->bindValue(":c", $cidade);
                $cmd->bindValue(":r", $rua);
                $cmd->bindValue(":b", $bairro);
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



            