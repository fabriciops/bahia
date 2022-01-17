<?php

class VeiculoCotacao{

    public $valorCotacaoFipe;
    public $marca;
    public $modelo;
    public $anoModelo;
    public $combustivel;
    public $codigoFipe;
    public $mesReferencia;
    public $dataConsulta;
    public $autenticacao;
    public $tipoVeiculo; 
    public $siglaCombustivel;
    public $nacional;
    public $categoria;

    function __construct(){

        $this->valorCotacaoFipe = 0;

    }

    function map(array $data) {
        
        $arrayData = $data;

        foreach($arrayData as $key => $val) {

            $reflectionMethod = new ReflectionMethod('VeiculoCotacao', 'set'.$key);
            $reflectionMethod->invoke($this, $val);                    
                      
        }
        
    }

    public function setNacional($nacional)
    {
        $this->nacional = $nacional;
    }

    public function getNacional()
    {
        return $this->nacional;
    }

    public function setcategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getcategoria()
    {
        return $this->categoria;
    }
    
    public function setValor(string $valorCotacaoFipe = null)
    {
        $this->valorCotacaoFipe = $valorCotacaoFipe;

        $_SESSION['valorCotacaoFipe'] = $this->valorCotacaoFipe;
    }

    public function getValor()
    {
        return $this->valorCotacaoFipe;
    }

    public function setMarca($marca){

        $this->marca = $marca;

    }

    public function getMarca(){

        return $this->marca;
        
    }
    public function setModelo($modelo){

        $this->modelo = $modelo;

    }

    public function getModelo(){
        
        return $this->modelo;
        
    }
    public function setAnoModelo($anoModelo){

        $this->anoModelo = $anoModelo;

    }

    public function getAnoModelo(){
        
        return $this->anoModelo;
        
    }
    public function setCombustivel($combustivel){

        $this->combustivel = $combustivel;

    }

    public function getCombustivel(){

        return $this->combustivel;
        
    }
    public function setCodigoFipe($codigoFipe){

        $this->codigoFipe = $codigoFipe;

    }

    public function getCodigoFipe(){

        return $this->codigoFipe;
        
    }
    public function setMesReferencia($mesReferencia){

        $this->mesReferencia = $mesReferencia;

    }

    public function getMesReferencia(){

        return $this->mesReferencia;
        
    }

    public function setTipoVeiculo($tipoVeiculo){

        $this->tipoVeiculo = $tipoVeiculo;

    }

    public function getTipoVeiculo(){

        return $this->tipoVeiculo;
        
    }
    public function setSiglaCombustivel($siglaCombustivel){

        $this->siglaCombustivel = $siglaCombustivel;

    }

    public function getSiglaCombustivel(){

        return $this->siglaCombustivel;
        
    }

    public function setAutenticacao($autenticacao){

        $this->autenticacao = $autenticacao;

    }

    public function getAutenticacao(){

        return $this->autenticacao;
        
    }

    public function setDataConsulta($dataConsulta){

        $this->dataConsulta = $dataConsulta;

    }

    public function getDataConsulta(){

        return $this->dataConsulta;
        
    }

}



?>