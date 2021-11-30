<?php
    require_once 'Conexao.php';
    class Produto{
        public $id;
        public $name;
        public $description;
        public $price;
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }
        
        


        public function produtosDisponiveis(){
            
            $cmd = $this->pdo->prepare("SELECT * FROM produto ORDER BY id_Produto ASC");
            $cmd->execute();
            if ($cmd->rowCount()>0) {
                while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    
                    echo"<div class='row'>
                            <div class='card'>
                                <h5 class='card-header'>{$dados['nomeProduto']}</h5>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$dados['descricao']}</h5>
                                    <p class='card-text'>R$ {$dados['preco']}</p>
                                    
                                </div>
                            </div>
                        </div>";
               
                }               
                   
            }
        }

        public function comprarProduto(){
            $cmd = $this->pdo->prepare("SELECT id_Produto, nomeProduto, preco FROM produto ORDER BY id_Produto ASC");
            $cmd->execute();
            if ($cmd->rowCount()>0) {
                    echo"<select class='form-control' name='idProduto'>
                                <option value='selecione' selected>Escolha um Plano</option>";
                while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$dados['id_Produto']}'>{$dados['nomeProduto']} - R$ <b>{$dados['preco']}</b></option>";
                }
                    echo "</select>";
            }
        }

        

        
    }
   
?>



            