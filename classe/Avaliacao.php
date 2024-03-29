<?php
    require_once 'Conexao.php';
    class   Avalicao{
        public $id;
        public $nota;
        public $mensagem; 
        public $idCliente;
        public $idPedido;
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        /*public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT nomeCliente,emailCliente, telefoneCliente, assunto, dataMensagem FROM atendimentocliente 
            JOIN cliente ON idCliente= id_Cliente");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }*/

        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarAvaliacao($nota,$mensagem,$idCliente,$idPedido){
            
                $cmd = $this->pdo->prepare("INSERT INTO avaliacao (nota, mensagem, idCliente, idPedido) VALUES ( :n, :m, :idC, :idP)");

                
                $cmd->bindValue(":n", $nota);
                $cmd->bindValue(":m", $mensagem); 
                $cmd->bindValue(":idC", $idCliente);   
                $cmd->bindValue(":idP", $idPedido);            
                
                $cmd->execute();
                return true;
            
            
        }
        
        //VISUALIZAR
       /* public function buscarDadosAtendimento($id){
            
            $res = array();
            
            $cmd = $this->pdo->prepare("SELECT email,telefone, assunto, mensagem, idCliente 
            FROM atendimentocliente WHERE id_Atendimento = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();

            //fetchAll SE FOSSE VARIOS REGISTROS
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;    
        }*/
  
        //TOTAL DE ATENDIMENTOS REGISTRADAS
        public function totalRegistroAvaliacao(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM avaliacao");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        
    }
   
?>



            