<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="CSS/incluir.css">
</head>
<body>
  <h1 id="tituloPagina">Inclusão de produtos</h1>
  
  <div class="form-container">
    <form>
      <div class="form-group">
      <table>
        <tr>
          <th><label class="form-label" for="id">ID:</label></th>
          <th><input type="text" id="id" class="form-input"></th>
        </tr>
        <tr>
            <th></th>
            <th><span id="lblId" class="error-message"></span></th>
          </tr>
      </div>
        <div class="form-group">
          <tr>
            <th><label class="form-label" for="sku">SKU:</label></th>
            <th><input type="text" id="sku" class="form-input"></th>
          </tr>
          <tr>
            <th></th>
            <th><span id="lblSku" class="error-message"></span></th>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <th><label class="form-label" for="descricao">Descrição:</label></th>
            <th><input type="text" id="descricao" class="form-input"></th>
          </tr>
          <tr>
            <th></th>
            <th><span id="lblDescricao" class="error-message"></span></th>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <th><label class="form-label" for="dataReferencia">Data de Referência:</label></th>
            <th><input type="date" id="dataReferencia" class="form-input"></th>
          </tr>
          <tr>
            <th></th>
            <th><span id="lblData" class="error-message"></span></th>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <th><label class="form-label" for="valorCusto">Valor de Referência:</label></th>
            <th><input type="number" step="0.01" id="valorCusto" class="form-input"></th>
          </tr>
          <tr>
            <th></th>
            <th><span id="lblValor" class="error-message"></span></th>
          </tr>
        </div>
        <div class="form-group">
          <tr>
            <th><label for="tipo">Tipo:</label></th>
            <th><select id="tipo"><option value="" disabled selected>Selecione o tipo</option></select></th>
          </tr>
          <tr>
            <th></th>
            <th><span id="lblTipo" class="error-message"></span></th>
          </tr>
        </div>
      </table>
    </form>
    <div class="button-container">
      <button class="button" id="btnVoltar">Voltar</button>
      <button class="button" id="btnGravar">Gravar</button>
    </div>
  </div>

  <script src="JS/home.js"></script>
</body>
</html>
