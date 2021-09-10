$(document).ready(function() {
    $('#reparoReforma').hide();
    $('#mySelect').change(function() {
      if ($('#mySelect').val() == 'reparo') {
        $('#reparoReforma').show();
      } else {
        $('#reparoReforma').hide();
      }
    });

    $('#ServicoEvento').hide();
    $('#mySelect').change(function() {
      if ($('#mySelect').val() == 'evento') {
        $('#ServicoEvento').show();
      } else {
        $('#ServicoEvento').hide();
      }
    });

    $('#ServicoSaude').hide();
    $('#mySelect').change(function() {
      if ($('#mySelect').val() == 'saude') {
        $('#ServicoSaude').show();
      } else {
        $('#ServicoSaude').hide();
      }
    });

    $('#ServicoDomenstico').hide();
    $('#mySelect').change(function() {
      if ($('#mySelect').val() == 'domestico') {
        $('#ServicoDomenstico').show();
      } else {
        $('#ServicoDomenstico').hide();
      }
    });

    $('#tecDesign').hide();
    $('#mySelect').change(function() {
      if ($('#mySelect').val() == 'tecnologia') {
        $('#tecDesign').show();
      } else {
        $('#tecDesign').hide();
      }
    });

    $('#assTecnica').hide();
    $('#mySelect').change(function() {
      if ($('#mySelect').val() == 'assistencia') {
        $('#assTecnica').show();
      } else {
        $('#assTecnica').hide();
      }
    });

    $("#telefone").mask("(00) 0000-0000");
});

 