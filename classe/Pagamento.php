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
        public function cadastrarPagamento($primeiroNome, $ultimoNome, $cpf, $telefone, $email, $idProduto, $idFr){
      
             $cmd = $this->pdo->prepare("INSERT INTO pagamento (primeiroNome, ultimoNome, cpf, 
             telefone, email, idProduto, idFr,  dataFinal)
             VALUES ( :p, :u, :c, :t, :e, :idP, :idF");

             
             $cmd->bindValue(":p", $primeiroNome);
             $cmd->bindValue(":u", $ultimoNome);
             $cmd->bindValue(":c", $cpf);
             $cmd->bindValue(":t", $telefone);               
             $cmd->bindValue(":e", $email); 
             $cmd->bindValue(":idP", $idProduto);
             $cmd->bindValue(":idF", $idFr);
        
             $cmd->execute();               
            
        }    
        
        public function dataFinal($id){
            $cmd = $this->pdo->prepare("SELECT * FROM pagamento JOIN freelancer ON idFr = id_Freelancer WHERE idFr = :idF");
            $cmd->bindValue(":idF", $id);
            $cmd->execute();
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            if($dados['idProduto'] == 1){
                $cmd = $this->pdo->prepare("UPDATE pagamento SET dataFinal = NOW()+INTERVAL 120 DAY WHERE idFr = :idF");
                $cmd->bindValue(":id", $id);

                $cmd->execute();
                return true;

                echo"<div class='card text-center'>
                        <div class='card-header'>
                            Featured
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>Special title treatment</h5>
                            <p class='card-text'>With supporting text below as a natural lead-in to additional content.</p>
                            <a href='#' class='btn btn-primary'>Go somewhere</a>
                        </div>
                        <div class='card-footer text-muted'>
                            2 days ago
                        </div>
                    </div>";
            }elseif($dados['idProduto'] == 2){
                $cmd = $this->pdo->prepare("UPDATE pagamento SET dataFinal = NOW()+INTERVAL 180 DAY WHERE idFr = :idF");
                $cmd->bindValue(":id", $id);

                $cmd->execute();
                return true;

                echo"<div class='card text-center'>
                        <div class='card-header'>
                            Featured
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>Special title treatment</h5>
                            <p class='card-text'>With supporting text below as a natural lead-in to additional content.</p>
                            <a href='#' class='btn btn-primary'>Go somewhere</a>
                        </div>
                        <div class='card-footer text-muted'>
                            2 days ago
                        </div>
                    </div>";
            }elseif($dados['idProduto'] == 3){
                $cmd = $this->pdo->prepare("UPDATE pagamento SET dataFinal = NOW()+INTERVAL 365 DAY WHERE idFr = :idF");
                $cmd->bindValue(":id", $id);

                $cmd->execute();
                return true;

                echo"<div class='card text-center'>
                        <div class='card-header'>
                            Featured
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>Special title treatment</h5>
                            <p class='card-text'>With supporting text below as a natural lead-in to additional content.</p>
                            <a href='#' class='btn btn-primary'>Go somewhere</a>
                        </div>
                        <div class='card-footer text-muted'>
                            2 days ago
                        </div>
                    </div>";
            }
        }

        public function restricaoAcesso($id){
            $cmd = $this->pdo->prepare("SELECT * FROM pagamento JOIN freelancer ON idFr = id_Freelancer WHERE idFr = :idF");
            $cmd->bindValue(":idF", $id);
            $cmd->fetch(PDO::FETCH_ASSOC);
            $cmd->execute();
            

            if($cmd->rowCount()>0){
                echo "<h5>Veja os Pedidos Diponíveis para sua Categoria!</h5>";
            }else{
                echo "<h5>Escolha seu Plano e Consiga mais Clientes todos os dias!</h5><br>
                <a href='pagamento/index.php'><button class='btn btn-warning'>PLANOS</button></a>";
            }
        }
      
    }
   
?>



            