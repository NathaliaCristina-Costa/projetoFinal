<?php
    require_once 'Conexao.php';
    class Pagamento{
        public $id;
        public $primeiroNome;
        public $ultimoNome;
        public $cpf;               
        public $telefone; 
        public $email;
        public $idFr;
        public $idProduto;       
        public $dataCompra;
        public $dataFinal; 
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }


        //FUNÇÃO CADASTRAR PAGAMENTOS NO BANCO DE DADOS
        public function cadastrarPagamento($primeiroNome, $ultimoNome, $cpf, $telefone, $email, $idFr){
      
             $cmd = $this->pdo->prepare("INSERT INTO pagamento (primeiroNome, ultimoNome, cpf, 
             telefone, email, idFr,  dataFinal)
             VALUES ( :p, :u, :c, :t, :e, :idF, NOW()+INTERVAL 1 DAY)");

             
             $cmd->bindValue(":p", $primeiroNome);
             $cmd->bindValue(":u", $ultimoNome);
             $cmd->bindValue(":c", $cpf);
             $cmd->bindValue(":t", $telefone);               
             $cmd->bindValue(":e", $email); 
             $cmd->bindValue(":idF", $idFr);
        
             $cmd->execute();               
            
        }        
      
    }
   
?>



            