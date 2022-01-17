<?php
require_once("../tabela_referencia.php");

function carro_marcas() {
    $referencia_atual = tabela_referencia()[0]->Codigo;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://veiculos.fipe.org.br/api/veiculos//ConsultarMarcas");
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("codigoTabelaReferencia"=>264, "codigoTipoVeiculo"=>1)));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $carromarcas = curl_exec($ch);

    curl_close ($ch);

    return $carromarcas;
}

echo carro_marcas();
?>