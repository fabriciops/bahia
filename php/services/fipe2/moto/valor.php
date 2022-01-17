<?php
require_once("../tabela_referencia.php");

function carro_valor($marca, $modelo, $ano, $combustivel) {
    $referencia_atual = tabela_referencia()[0]->Codigo;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://veiculos.fipe.org.br/api/veiculos//ConsultarValorComTodosParametros");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        "codigoTabelaReferencia"=>$referencia_atual,
        "codigoTipoVeiculo"=>1,
        "tipoConsulta"=>"tradicional",
        "codigoMarca"=>$marca,
        "codigoModelo"=>$modelo,
        "anoModelo"=>$ano,
        "codigoTipoCombustivel"=>$combustivel
    )));

    $carrovalor = curl_exec($ch);

    curl_close ($ch);

    return $carrovalor;
}

echo carro_valor($_GET["marca"],$_GET["modelo"], $_GET["ano"], $_GET["combustivel"]);
?>