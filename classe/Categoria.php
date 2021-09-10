<?php

    class Categoria{
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
            $cmd = $this->pdo->query("SELECT * FROM categoria ORDER BY id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA CATEGORIA NO BANCO DE DADOS
        public function cadastrarCategoria($nome){
            //ANTES DE CADASTRAR, VERIFICAR SE CATEGORIA JÁ FOI CADASTRADA
            $cmd = $this->pdo->prepare("SELECT id_Categoria FROM categoria WHERE nomeCategoria = :n");
            $cmd->bindValue(":n", $nome);
            $cmd->execute();

            //Se rowCount for > 0 é pq Categoria já existe no banco de dados então retorna falso
            if($cmd->rowCount()>0){
                return false;
            }else{ //categoria não encontrada retornar verdadeiro
                $cmd = $this->pdo->prepare("INSERT INTO categoria (nomeCategoria) VALUES (:n)");

                $cmd->bindValue(":n", $nome);
                $cmd->execute();
                return true;
            }
        }

        //METODO DE EXCLUSÃO
        public function excluirCategoria($id){
            $cmd = $this->pdo->prepare("DELETE FROM categoria WHERE id_Categoria = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

        //BUSCAR DADOS DE CATEGORIA ESPECÍFICA
        public function buscarDadosCategoria($id){
            
            $res = array();
            
            $cmd = $this->pdo->prepare("SELECT nomeCategoria FROM categoria WHERE id_Categoria = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();

            //fetchAll SE FOSSE VARIOS REGISTROS
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
        //ATUALIZAR DADOS NO BANCO DE DADOS
        public function atualizarDados($id, $nome){
            $cmd = $this->pdo->prepare("SELECT id_Categoria FROM categoria WHERE nomeCategoria = :n");
            $cmd->bindValue(":n", $nome);
            $cmd->execute();

            //Se rowCount for > 0 é pq Categoria já existe no banco de dados então retorna falso
            if($cmd->rowCount()>0){
                return false;
            }else{ 

                $cmd = $this->pdo->prepare("UPDATE categoria SET nomeCategoria = :n WHERE id_Categoria = :id");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":id", $id);

                $cmd->execute();
                return true;
            }

        }

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroCategoria(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }
    }
   
?>



            