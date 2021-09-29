<?php
    require_once 'Conexao.php';
    class   Atendimento{
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT nome,assunto FROM atendimentocliente ORDER BY id_Atendimento ");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarAtendimento($nome,$email, $assunto, $mensagem,$id_Cliente){
            
                $cmd = $this->pdo->prepare("INSERT INTO atendimentocliente (nome,email, assunto, mensagem, id_Cliente) VALUES (:n,:e, :a, :m, :idC)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":a", $assunto);
                $cmd->bindValue(":m", $mensagem); 
                $cmd->bindValue(":idC", $id_Cliente);              
                
                $cmd->execute();
                return true;
            
            
        }

        


       

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroAtendimento(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM atendimentocliente");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        
    }
   
?>



            