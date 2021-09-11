<?php

    class Cliente{
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
            $cmd = $this->pdo->query("SELECT * FROM cliente ORDER BY id_Cliente");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA CLIENTE NO BANCO DE DADOS
        public function cadastrarCliente($nome, $telefone, $email, $senha){
            //ANTES DE CADASTRAR, VERIFICAR SE CATEGORIA JÁ FOI CADASTRADA
            $cmd = $this->pdo->prepare("SELECT id_Cliente FROM cliente WHERE emailCliente = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();

            //pessoa já cadastrada;
            if($cmd->rowCount()>0){
                return false;
            }else{ 
             //pessoa não encontrada retornar verdadeiro
                $cmd = $this->pdo->prepare("INSERT INTO cliente (nomeCliente, telefoneCliente, emailCliente, senhaCliente) VALUES (:n, :t, :e, :s)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":t", $telefone);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":s", md5($senha));
                $cmd->execute();
                return true;
            }
            
        }

        //FAZER O LOGIN
        public function logar($email, $senha){
            //Verificar se existe cadastro do cliente
            $cmd = $this->pdo->prepare("SELECT id_Cliente FROM cliente WHERE emailCliente = :e AND senhaCliente = :s");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();

            //se retornou ID a pessoa está cadastrada
            if ($cmd->rowCount()>0) {
               //Entrar no sistema
               $res = $cmd->fetch();
               session_start();
               $_SESSION['id_Cliente'] = $res['id_Cliente']; 
               return true; // Login Efetuado
            }else{
                return false;
            }
        }

        //METODO DE EXCLUSÃO
        public function excluirCliente($id){
            $cmd = $this->pdo->prepare("DELETE FROM cliente WHERE id_Cliente = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

       

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroCliente(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM cliente");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        
    }
   
?>



            