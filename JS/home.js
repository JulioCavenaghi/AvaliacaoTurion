$(document).ready(function() {
  $('#btnAdicionar').off('click')
  $('#btnAdicionar').click(function() {
    $('.content').load('PHP/View/incluir.php');
    preencherTipos()
  });

  $('.btnExibirProdutos').off('click')
  $('.btnExibirProdutos').click(function() {
    exibirProdutos();
  });

  $('#btnVoltar').off('click')
  $('#btnVoltar').click(function() {
    exibirProdutos();
  });

  $('#btnGravar').off('click');
  $('#btnGravar').click(function() {
    var id = $('#id').val();
    id != '' ? id = id : id = 0;
    var sku = $('#sku').val();
    var descricao = $('#descricao').val();
    var dataReferencia = $('#dataReferencia').val();
    var valorCusto = $('#valorCusto').val();
    var tipo = $('#tipo').val();
    var validar = false;
    
    validar = validarEnvio()    

    if (validar == true){
      var data = {
        id: id,
        sku: sku,
        descricao: descricao,
        dataReferencia: dataReferencia,
        valorCusto: valorCusto,
        tipo: tipo
      };
      if(id == 0){
        inserirProduto(data);
      } else{
        alterarProduto(data)
      }
    }
  });

  $('#id').prop('disabled', true);
});

function inserirProduto(dados) {
  executarRequisicao('inserir', dados, '');
  alert('Registro inserido com sucesso');
  exibirProdutos()
}

function alterarProduto(dados) {
  executarRequisicao('alterar', dados, '');
  alert('Registro alterado com sucesso');
  exibirProdutos()
}

function excluirProduto(dados) {
  executarRequisicao('excluir', dados,  '')
  alert('Registro excluido com sucesso');
  exibirProdutos()
}

function exibirProdutoId(dados) {
  $('.content').load('PHP/View/incluir.php');
  preencherTipos()
  executarRequisicao('visualizarId', dados, function(detalhes) {  
    var arrayDetalhes = JSON.parse(detalhes);
    $('#tituloPagina').text("Alteração de produtos");
    $('#id').val(arrayDetalhes.id);
    $('#sku').val(arrayDetalhes.sku);
    $('#descricao').val(arrayDetalhes.descricao);
    $('#dataReferencia').val(arrayDetalhes.dataReferencia);
    $('#valorCusto').val(arrayDetalhes.valorCusto);
    $('#tipo').val(arrayDetalhes.tipo)   
  });
}

function exibirProdutos() {
  $('.content').load('PHP/View/produto.php');
  executarRequisicao('visualizar', '', function(produtos) {  
    var arrayProdutos = JSON.parse(produtos);
    $('.produtos-item').remove();
    for (var i = 0; i < arrayProdutos.length; i++) {
      var produto = arrayProdutos[i];
      var html = '<tr class="produtos-item" data-id="' + produto.id + '">';
      html += '<td>' + produto.id + '</td>';
      html += '<td class="alterar" onclick="exibirProdutoId('+produto.id+')"><a href="#">' + produto.sku + '</a></td>';
      html += '<td>' + produto.descricao + '</td>';
      html += '<td>' + produto.valorCusto + '</td>';
      html += '<td><button class="button button-danger" onclick="excluirProduto('+produto.id+')">Excluir</button></td>';
      html += '</tr>';
      $('#tabelaProdutos').append(html);
    }
  });
}

function preencherTipos(){
  tipos = executarRequisicao('tipo', '',function(tipos) {
    var select = $('#tipo') 
    var arrayTipos = JSON.parse(tipos);
    for (var i = 0; i < arrayTipos.length; i++) {
      var tipo = arrayTipos[i];
      var option = $("<option></option>").text(tipo.descricao).val(tipo.codigo);
      select.append(option);
    }
  })
}

function validarEnvio(){
  var sku = $('#sku').val();
  var descricao = $('#descricao').val();
  var dataReferencia = $('#dataReferencia').val();
  var valorCusto = $('#valorCusto').val();
  var tipo = $('#tipo').val()
  var mensagemVazia = 'O campo não pode ser vazio'
  var mensagemPequena = 'Este campo deve ser maior que 5 caracteres'

  $('#lblSku').text('')
  $('#lblDescricao').text('')
  $('#lblData').text('')
  $('#lblValor').text('')
  $('#lblTipo').text('')

  if (sku == '') {
    $('#lblSku').text(mensagemVazia)
    return false;
  } else if(sku.length < 5){
    $('#lblSku').text(mensagemPequena)
    return false;
  } else if (descricao == '') {
    $('#lblDescricao').text(mensagemVazia)
    return false;
  } else if(descricao.length < 5){
    $('#lblDescricao').text(mensagemPequena)
    return false;
  } else if (dataReferencia == '') {
    $('#lblData').text(mensagemVazia)
    return false;
  } else if (valorCusto == '') {
    $('#lblValor').text(mensagemVazia)
    return false;
  } else if (valorCusto < 1) {
    $('#lblValor').text('Valor deve ser maior que 1')
    return false;
  } else if (tipo == '' || tipo == null) {
    $('#lblTipo').text(mensagemVazia)
    return false;
  } else {
    return true;
  }
}

function executarRequisicao(opcao, dados, callback) {
  $.ajax({
    url: 'PHP/Controller/controller.php',
    type: 'POST',
    data: { 
      opcao: opcao,
      dados: dados
    },
    dataType: 'json',
    success: function(response) {
      callback(response);
    },
    error: function(error) {
      console.error(error);
    }
  });
}
