<?php
    class Conexao{
        private static $instancia;

        
      
        public  function __construct(){}

        public static function getConexao(){
            if(!isset(self::$instancia)){
                $dbname = 'projetoFinal';
                $host   = 'localhost';
                $user   = 'root';
                $senha  = '';


                try {
                    self::$instancia = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);
                } catch (\Throwable $e) {
                    echo 'Erro: '.$e;
                }
            }            

            return self::$instancia;

        }

    }
?>