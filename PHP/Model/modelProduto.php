<?php
class modelProduto
{
    public function visualizarProdutos()
    {
        $curl = curl_init();

        $url = 'http://54.94.96.111:63616/produto';

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if(curl_errno($curl)) {
            $error = curl_error($curl);
            echo "Erro na requisição: " . $error;
            return http_response_code(400);
        }

        curl_close($curl);

        return $response;
    }

    public function visualizarTipos()
    {
        $curl = curl_init();

        $url = 'http://54.94.96.111:63616/produto/tipo';

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if(curl_errno($curl)) {
            $error = curl_error($curl);
            echo "Erro na requisição: " . $error;
            return http_response_code(400);
        }

        curl_close($curl);

        return $response;
    }

    public function inserirProduto($dados)
    {
        $curl = curl_init();

        $url = 'http://54.94.96.111:63616/produto';
        $dados = json_encode($dados);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($dados)
        ));

        $response = curl_exec($curl);

        if(curl_errno($curl)) {
            $error = curl_error($curl);
            echo "Erro na requisição: " . $error;
            return http_response_code(400);
        }

        curl_close($curl);

        return $response;
    }

    public function excluirProduto($dados)
    {
        $url = 'http://54.94.96.111:63616/produto/' . $dados;


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

         if(curl_errno($curl)) {
            $error = curl_error($curl);
            echo "Erro na requisição: " . $error;
            return http_response_code(400);
        }

        curl_close($curl);

        return $response;
    }

    public function visualizarProdutoId($dados)
    {
        $curl = curl_init();

        $url = 'http://54.94.96.111:63616/produto/'. $dados;

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if(curl_errno($curl)) {
            $error = curl_error($curl);
            echo "Erro na requisição: " . $error;
            return http_response_code(400);
        }

        curl_close($curl);

        return $response;
    }

    public function alterarProduto($dados)
    {
        $url = 'http://54.94.96.111:63616/produto/';

        $dados = json_encode($dados);

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dados); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($dados)
        ));

        $response = curl_exec($curl);

        if(curl_errno($curl)) {
            $error = curl_error($curl);
            echo "Erro na requisição: " . $error;
            return http_response_code(400);
        }

        curl_close($curl);
    }
}
