<?php
    require_once 'Conexao.php';
    class Freelancer{
        public $id;
        public $nome;
        public $email;
        public $senha;
        public $telefone;
        public $cpf; 
        public $cep;
        public $rua;
        public $bairro;
        public $cidade;
        public $uf;                
        public $id_Categoria;
        private $pdo;
        
       
        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados()
        {

            $res = array();
            $cmd = $this->pdo->query("SELECT nome,cpf,telefone, nomeCategoria, id_Freelancer FROM freelancer JOIN categoria ON idCategoria = id_Categoria");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //BUSCAR CATEGORIAS PARA TELA DE CADASTRO
        public function buscarCategoria(){

            $cmd = $this->pdo->prepare("SELECT nomeCategoria, id_Categoria FROM categoria");
            $cmd->execute();

            if ($cmd->rowCount()>0) {
                    echo"<option value='selecione' selected>Escolha sua Categoria</option>";
                while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$dados['id_Categoria']}'>{$dados['nomeCategoria']}</option>";
                }
            }
        }

        //FUNÇÃO CADASTRA FREELANCER NO BANCO DE DADOS
        public function cadastrarFreelancer($nome, $email, $senha, $telefone, $cpf, $cep, $rua, $bairro, $cidade, $uf, $id_Categoria){
            //ANTES DE CADASTRAR, VERIFICAR SE CATEGORIA JÁ FOI CADASTRADA
            $cmd = $this->pdo->prepare("SELECT id_Freelancer FROM freelancer WHERE cpf = :cpf");
            $cmd->bindValue(":cpf", $cpf);
            $cmd->execute();

            //pessoa já cadastrada;
            if($cmd->rowCount()>0){
                return false;
            }else{ 
             //pessoa não encontrada retornar verdadeiro
                $cmd = $this->pdo->prepare("INSERT INTO freelancer (nome, email, senha, telefone, cpf, cep, rua, bairro,cidade,uf, idCategoria)
                 VALUES (:n, :e, :s, :t, :cpf, :cep, :r, :b,:c, :u, :idC)");

                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":s", $senha);
                $cmd->bindValue(":t", $telefone);
                $cmd->bindValue(":cpf", $cpf); 
                $cmd->bindValue(":cep", $cep);
                $cmd->bindValue(":r", $rua);
                $cmd->bindValue(":b", $bairro);
                $cmd->bindValue(":c", $cidade);
                $cmd->bindValue(":u", $uf);                
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

        //TOTAL DE FREELANCERS REGISTRADAS
        public function totalRegistroFreelancer(){
            
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM freelancer");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
           
        }

        //FAZER O LOGIN
        public function logar($email, $senha){
            //Verificar se existe cadastro do cliente
            $cmd = $this->pdo->prepare("SELECT id_Freelancer, email FROM freelancer WHERE email = :e AND senha = :s");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();

            //se retornou ID a pessoa está cadastrada
            if ($cmd->rowCount()>0) {
               //Entrar no sistema
               $res     = $cmd->fetch();
               session_start();
               $_SESSION['id_Freelancer'] = $res['id_Freelancer'];
               return true; // Login Efetuado
            }else{
              
                return false;
            }
        }

        //EXIBIR NOME USUARIO LOGADO
        public function exibeNomeLogado($id){
            $array = array();

            $cmd = $this->pdo->prepare("SELECT nome FROM freelancer WHERE id_Freelancer = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();

            if ($cmd->rowCount()>0) {
                $array = $cmd->fetch();
            }

            return $array;
        }
        
        //BUSCAR DADOS DE FREELANCER ESPECÍFICO
        public function buscarDadosFreelancer($id){
            
            $res = array();
            
            $cmd = $this->pdo->prepare("SELECT nome, email, telefone, cep, rua, bairro, cidade, uf FROM freelancer
            WHERE id_Freelancer = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();

            //fetchAll SE FOSSE VARIOS REGISTROS
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

        //BUSCAR DADOS DE FREELANCER ESPECÍFICO
        public function buscarCatgoriaFreelancer($id){
            
            $res = array();
            
            $cmd = $this->pdo->prepare("SELECT nomeCategoria FROM freelancer
             JOIN categoria ON idCategoria = id_Categoria  WHERE id_Freelancer = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();

            //fetchAll SE FOSSE VARIOS REGISTROS
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

        //ATUALIZAR DADOS NO BANCO DE DADOS
        public function editarMinhaConta($id, $nome, $email, $telefone, $cep, $rua, $bairro, $cidade, $uf){
            $cmd = $this->pdo->prepare("SELECT id_Freelancer FROM freelancer WHERE nome = :n AND email = :e AND telefone = :t AND cep = :cep AND rua = :r 
            AND bairro = :b AND cidade = :c AND uf = :uf ");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":t", $telefone);
            $cmd->bindValue(":cep", $cep);
            $cmd->bindValue(":r", $rua);
            $cmd->bindValue(":b", $bairro);
            $cmd->bindValue(":c", $cidade);
            $cmd->bindValue(":uf", $uf);
            
            $cmd->execute();

            //Se rowCount for > 0 é pq Categoria já existe no banco de dados então retorna falso
            if($cmd->rowCount()>0){
                return false;
            }else{ 

                $cmd = $this->pdo->prepare("UPDATE freelancer SET 
                nome= :n, email = :e, telefone = :t, cep = :cep, rua = :r, bairro = :b, cidade = :c, uf = :uf
                WHERE id_Freelancer = :id");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":t", $telefone);
                $cmd->bindValue(":id", $id);
                $cmd->bindValue(":cep", $cep);
                $cmd->bindValue(":r", $rua);
                $cmd->bindValue(":b", $bairro);
                $cmd->bindValue(":c", $cidade);
                $cmd->bindValue(":uf", $uf);
            

                $cmd->execute();
                return true;
            }

        }

        //ATUALIZAR DADOS NO BANCO DE DADOS
        public function editarMinhaCategoria($id, $idCategoria){
            $cmd = $this->pdo->prepare("SELECT id_Freelancer FROM freelancer WHERE idCategoria = :idC");
            
            $cmd->bindValue(":idC", $idCategoria);
            
            $cmd->execute();

            //Se rowCount for > 0 é pq Categoria já existe no banco de dados então retorna falso
            if($cmd->rowCount()>0){
                return false;
            }else{ 

                $cmd = $this->pdo->prepare("UPDATE freelancer SET  idCategoria = :idC 
                WHERE id_Freelancer = :id");
                $cmd->bindValue(":id", $id);
                $cmd->bindValue(":idC", $idCategoria);
            

                $cmd->execute();
                return true;
            }

        }

        public function restricaoAcesso($id){
            $cmd = $this->pdo->prepare("SELECT idPlano, id_Freelancer FROM freelancer
            WHERE id_Freelancer  = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($dados['idPlano'] == 0) {
                echo "<h5>Escolha seu Plano e Consiga mais Clientes todos os dias!</h5><br>
                      <a href='pagamento/index.php'><button class='btn btn-warning'>PLANOS</button></a>";
            }else{
                echo " <h5>Veja os Pedidos Diponíveis para sua Categoria!</h5>";
            }
        }

        
    }
?>
