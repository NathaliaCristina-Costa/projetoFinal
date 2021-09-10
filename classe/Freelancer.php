<?php

    class Freelancer{
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
        public function buscarDadosCategoria(){

            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM categoria ORDER BY id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM freelancer ORDER BY id_Freelancer");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarFreelancer($nome, $telefone, $email, $senha){
            //ANTES DE CADASTRAR, VERIFICAR SE CATEGORIA JÁ FOI CADASTRADA
            $cmd = $this->pdo->prepare("SELECT id_Freelancer FROM freelancer WHERE email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();

            //pessoa já cadastrada;
            if($cmd->rowCount()>0){
                return false;
            }else{ 
             //pessoa não encontrada retornar verdadeiro
                $cmd = $this->pdo->prepare("INSERT INTO cliente (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":t", $telefone);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":s", $senha);
                $cmd->execute();
                return true;
            }
            
        }

       

        //METODO DE EXCLUSÃO
        public function excluirFreelancer($id){
            $cmd = $this->pdo->prepare("DELETE FROM freelancer WHERE id_Freelancer = :id");
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



        
    }
   
?>



            