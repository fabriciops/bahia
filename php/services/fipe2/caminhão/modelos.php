<?php
require_once("../tabela_referencia.php");

function modelos($marca) {
    $referencia_atual = tabela_referencia()[0]->Codigo;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://veiculos.fipe.org.br/api/veiculos//ConsultarModelos");
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("codigoMarca"=>$marca, "codigoTabelaReferencia"=>264, "codigoTipoVeiculo"=>3)));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $caminhãomodelos = curl_exec($ch);

    curl_close ($ch);

    return $caminhãomodelos;
}

echo carro_modelos($_GET["marca"]);
?>