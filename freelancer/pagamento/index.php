<?php

include './configuracao1.php';

/* incluir aquivo do banco */
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> JOBS - PagSeguro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/personalizado.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <button onclick="pagamento()" class="btn btn-success">Pagar</button>
                        <span class="endereco" data-endereco="<?php echo URL;?>"></span>
                    </div>
                </div>        
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <div class="meio-pg"></div>
                    </div>
                </div>        
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

        <script type="text/javascript" src="<?php echo SCRIPT_PAGSEGURO; ?>"></script>
        <script src="js/personalizado.js"></script>
    </body>
</html>
