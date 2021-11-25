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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <span class="endereco" data-endereco="<?php echo URL; ?>"></span>
        <span id="msg"></span>
        <form name="formPagamento" action="" id="formPagamento">
            <input type="hidden" name="paymentMethod" id="paymentMethod" value="creditCard">

            <input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_LOJA; ?>">

            <input type="hidden" name="currency" id="currency" value="<?php echo MOEDA_PAGAMENTO; ?>">

            <input type="hidden" name="extraAmount" id="extraAmount" value="">

            <input type="hidden" name="itemId1" id="itemId1" value="0001">

            <input type="hidden" name="itemDescription1" id="itemDescription1" value="Curso de PHP Orientado a Objetos">

            <input type="hidden" name="itemAmount1" id="itemAmount1" value="600.00">

            <input type="hidden" name="itemQuantity1" id="itemQuantity1" value="1">

            <input type="hidden" name="notificationURL" id="notificationURL" value="<?php echo URL_NOTIFICACAO; ?>">

            <input type="hidden" name="reference" id="reference" value="1001">


            <h2>Dados do Cartão</h2>
            <label>Número do cartão</label>
            <input type="text" name="numCartao" id="numCartao" required>
            <span class="bandeira-cartao"></span><br><br>

            <label>CVV do cartão</label>
            <input type="text" name="cvvCartao" id="cvvCartao" maxlength="3" required><br><br>

            <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">

            <label>Mês de Validade</label>
            <input type="text" name="mesValidade" id="mesValidade" maxlength="2" required><br><br>

            <label>Ano de Validade</label>
            <input type="text" name="anoValidade" id="anoValidade" maxlength="4" required><br><br>

            <label>Quantidades de Parcelas</label>
            <select name="qntParcelas" id="qntParcelas" class="select-qnt-parcelas">
                <option value="">Selecione</option>
            </select><br><br>

            <input type="hidden" name="valorParcelas" id="valorParcelas">

            <label>CPF do dono do Cartão</label>
            <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" required><br><br>

            <label>Nome no Cartão</label>
            <input type="text" name="creditCardHolderName" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão" required><br><br>

            <input type="hidden" name="tokenCartao" id="tokenCartao">

            <input type="hidden" name="hashCartao" id="hashCartao">

            <h2>Endereço do dono do cartão</h2>

            <label>Logradouro</label>
            <input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua" required><br><br>

            <label>Número</label>
            <input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número" required><br><br>

            <label>Complemento</label>
            <input type="text" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento"><br><br>

            <label>Bairro</label>
            <input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro"><br><br>

            <label>CEP</label>
            <input type="text" name="billingAddressPostalCode" id="billingAddressPostalCode" placeholder="CEP sem traço" required><br><br>

            <label>Cidade</label>
            <input type="text" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade" required><br><br>

            <label>Estado</label>
            <input type="text" name="billingAddressState" id="billingAddressState" placeholder="Sigla do Estado" required><br><br>

            <input type="hidden" name="billingAddressCountry" id="billingAddressCountry" value="BRL">

            <h2>Dados do Comprador</h2>

            <label>Nome</label>
            <input type="text" name="senderName" id="senderName" placeholder="Nome completo" required><br><br>

            <label>Data de Nascimento</label>
            <input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" required><br><br>

            <label>CPF</label>
            <input type="text" name="senderCPF" id="senderCPF" placeholder="CPF sem traço" required><br><br>

            <label>Telefone</label>
            <input type="text" name="senderAreaCode" id="senderAreaCode" placeholder="DDD" required>
            <input type="text" name="senderPhone" id="senderPhone" placeholder="Somente número" required><br><br>

            <label>E-mail</label>
            <input type="email" name="senderEmail" id="senderEmail" placeholder="E-mail do comprador" required><br><br>

            <h2>Endereço de Entrega</h2>
            <input type="hidden" name="shippingAddressRequired" id="shippingAddressRequired" value="true">

            <label>Logradouro</label>
            <input type="text" name="shippingAddressStreet" id="shippingAddressStreet" placeholder="Av. Rua"><br><br>

            <label>Número</label>
            <input type="text" name="shippingAddressNumber" id="shippingAddressNumber" placeholder="Número"><br><br>

            <label>Complemento</label>
            <input type="text" name="shippingAddressComplement" id="shippingAddressComplement" placeholder="Complemento"><br><br>

            <label>Bairro</label>
            <input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" placeholder="Bairro"><br><br>

            <label>CEP</label>
            <input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" placeholder="CEP sem traço"><br><br>

            <label>Cidade</label>
            <input type="text" name="shippingAddressCity" id="shippingAddressCity" placeholder="Cidade"><br><br>

            <label>Estado</label>
            <input type="text" name="shippingAddressState" id="shippingAddressState" placeholder="Sigla do Estado"><br><br>

            <input type="hidden" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL">

            <label>Frete</label>
            <input type="radio" name="shippingType" value="1"> PAC
            <input type="radio" name="shippingType" value="2"> SEDEX
            <input type="radio" name="shippingType" value="3"> Sem frete<br><br>

            <label>Valor Frete</label>
            <input type="text" name="shippingCost" id="senderCPF" placeholder="Preço do frete. Ex: 2.10"><br><br>


            <input type="submit" name="btnPagar" id="btnPagar" value="Pagar" class="btn btn-success">
        </form>


        <!--<div class="meio-pag"></div>-->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo SCRIPT_PAGSEGURO; ?>"></script>
        <script src="js/personalizado.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </div>
</body>

</html>