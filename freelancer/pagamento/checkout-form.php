<?php
  require_once "../../classe/Produto.php";
  $p = new Produto();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>formulario de chekout</title>
    </head>
    <body>        

        

        <div class="container">
            <div class="py-5 text-center">
               
                <h2>Formulário de Pagamento</h2>
               
            </div>
            
            <hr>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h4 class="mb-3">Informações Pessoais</h4>
                    
                    <form method="POST" action="comprar.php">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">Primeiro Nome</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Primeiro nome" autofocus >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name">Último Nome</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Último nome"  >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Somente número do CPF" maxlength="14" oninput="maskCPF(this)" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone com o DDD" maxlength="14" oninput="maskPhone(this)" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite o seu melhor e-mail"2>
                        </div>
                        <input type="submit" value="Comprar" class="btn btn-success">                        
                    </form>
                </div>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="js/custom.js"></script>

       

    </body>
</html>