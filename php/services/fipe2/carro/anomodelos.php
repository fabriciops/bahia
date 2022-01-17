<?php
require_once("../tabela_referencia.php");

function carro_anomodelos($marca, $modelo) {
    $referencia_atual = tabela_referencia()[0]->Codigo;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://veiculos.fipe.org.br/api/veiculos//ConsultarAnoModelo");
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("codigoMarca"=>$marca, "codigoModelo"=>$modelo, "codigoTabelaReferencia"=>264, "codigoTipoVeiculo"=>1)));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $carroanomodelos = curl_exec($ch);

    curl_close ($ch);

    return $carroanomodelos;
}

echo carro_anomodelos($_GET["marca"],$_GET["modelo"]);
?>