<?php
    require_once 'Conexao.php';
    class   AtendeFreelancer{
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM atendimentofreelancer ORDER BY idAtenFreelancer ");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarAtendimento($nome,$email, $assunto, $mensagem,$idFreelancer){
            
                $cmd = $this->pdo->prepare("INSERT INTO atendimentofreelancer (nome,email, assunto, mensagem, idFreelancer) VALUES (:n,:e, :a, :m, :idF)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":a", $assunto);
                $cmd->bindValue(":m", $mensagem); 
                $cmd->bindValue(":idF", $idFreelancer);              
                
                $cmd->execute();
                return true;
            
            
        }

        
        //VISUALIZAR
        public function buscarDadosAtendimento($id){
            
            $res = array();
            
            $cmd = $this->pdo->prepare("SELECT nome, email, assunto, mensagem FROM atendimentofreelancer WHERE idAtenFreelancer = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();

            //fetchAll SE FOSSE VARIOS REGISTROS
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

       

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroAtendimento(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM atendimentofreelancer");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        
    }
   
?>



            