//$(document).ready(function(){
 // Executa assim que o botão de salvar for clicado
 //$('#registrar').click(function(e){

 $(document).ready(function(){
        $('#registrar').click(function(e){
            // Cancela o envio do formulário
        e.preventDefault();

        // Pega os valores dos inputs e coloca nas variáveis
        var nome = $('#nome').val();    
        var telefone = $('#telefone').val();
        var email = $('#email').val();
        var senha = $('#senha').val();

        // Método post do Jquery
        $.post('salvaCliente.php', {
            nome:nome,        
            telefone:telefone,
            email:email,
            senha:senha
        }, function(resposta){
            // Valida a resposta
            if(resposta != ''){
                // Limpa os inputs
                $('input').val('');
                alert("Conta Criada");
            }else {
                alert(resposta);
            }
        });
    });
 });
    
    

