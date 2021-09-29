<?php
    require_once 'Conexao.php';
    class Freelancer{
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT nome,email, telefone, nomeCategoria FROM freelancer JOIN categoria ON idCategoria = id_Categoria; ");
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

        public function buscarPedido(){
            
            $cmd = $this->pdo->prepare("SELECT nomeCategoria, cidade, estado, mensagem FROM pedido JOIN categoria ON idCategoria = id_Categoria");
            $cmd->execute();

            $cmd->execute();

           
        }


        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarFreelancer($nome, $email, $senha, $telefone, $id_Categoria){
            //ANTES DE CADASTRAR, VERIFICAR SE CATEGORIA JÁ FOI CADASTRADA
            $cmd = $this->pdo->prepare("SELECT id_Freelancer FROM freelancer WHERE email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();

            //pessoa já cadastrada;
            if($cmd->rowCount()>0){
                return false;
            }else{ 
             //pessoa não encontrada retornar verdadeiro
                $cmd = $this->pdo->prepare("INSERT INTO freelancer (nome, email, senha, telefone, idCategoria) VALUES (:n, :e, :s, :t, :idC)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":s", $senha);
                $cmd->bindValue(":t", $telefone);  
                $cmd->bindValue(":idC", $id_Categoria);           
                
                $cmd->execute();
                return true;
            }
            
        }

        

        //METODO DE EXCLUSÃO
        public function excluirFreelancer($id){
            $cmd = $this->pdo->prepare("DELETE FROM freelancer WHERE id_Freelancer  = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

       

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroFreelancer(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM freelancer");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        //FAZER O LOGIN
        public function logar($email, $senha){
            //Verificar se existe cadastro do cliente
            $cmd = $this->pdo->prepare("SELECT id_Freelancer,nome FROM freelancer WHERE email = :e AND senha = :s");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();

            //se retornou ID a pessoa está cadastrada
            if ($cmd->rowCount()>0) {
               //Entrar no sistema
               $res = $cmd->fetch();
               session_start();
               $_SESSION['id_Freelancer'] = $res['id_Freelancer']; 
               return true; // Login Efetuado
            }else{
                return false;
            }
        }

        
    }
   
?>



            