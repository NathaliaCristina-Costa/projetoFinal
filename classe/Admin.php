<?php
    require_once "Conexao.php";
    class Admin{
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //FAZER O LOGIN
        public function logar($nome, $senha){
            //Verificar se existe cadastro do cliente
            $cmd = $this->pdo->prepare("SELECT id_Admin, nome FROM administrador WHERE nome = :n AND senha = :s");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();

            //se retornou ID a pessoa está cadastrada
            if ($cmd->rowCount()>0) {
               //Entrar no sistema
               $res     = $cmd->fetch();
               session_start();
               $_SESSION['id_Admin'] = $res['id_Admin']; 
               return true; // Login Efetuado
            }else{
              
                return false;
            }
        }

    }

?>