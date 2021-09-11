<?php

    class   Atendimento{
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
            $cmd = $this->pdo->query("SELECT nome,assunto FROM atendimentocliente ORDER BY id_Atendimento ");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarAtendimento($nome, $assunto, $mensagem, $id_Cliente){
            
                $cmd = $this->pdo->prepare("INSERT INTO atendimentocliente (nome, assunto, mensagem, id_Cliente) VALUES (:n, :a, :m, :idC)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $assunto);
                $cmd->bindValue(":s", $mensagem);
                $cmd->bindValue(":idC", $id_Cliente);               
                
                $cmd->execute();
                return true;
            
            
        }

        


       

        //TOTAL DE CATEGORIAS REGISTRADAS
        public function totalRegistroAtendimento(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM atendimentocliente");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        
    }
   
?>



            