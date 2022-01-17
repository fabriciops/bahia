<?php

class PersonCotation{
    
    public $nome;
    public $email;
    public $telefone;
    public $tipoUso;
    public $valorAdsao;

    function map(array $data) {
        
        $arrayData = $data;

        foreach($arrayData as $key => $val) {

            $reflectionMethod = new ReflectionMethod('PersonCotation', 'set'.$key);
            $reflectionMethod->invoke($this, $val);                    
                      
        }
        
    }

    public function getName(){
        return $this->nome;
    }

    public function setName(string $nome = null){

        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email = null){

        $this->email = $email;
    }

    public function getPhone(){
        return $this->telefone;
    }

    public function setPhone(string $telefone = null){

        $this->telefone = $telefone;
    }

    public function getTipoUso(){
        return $this->tipoUso;
    }

    public function setTipoUso(string $TipoUso = null){

        $this->tipoUso = $TipoUso;
    }

    public function setValorAdsao(){

        
    }

    public function getValorAdsao(){

        return $this->valorAdsao;
        
    }

    public function getresult(){

        if($_SESSION['valorCotacaoFipe']){

            $typeDrive = $this->tipoVeiculo;
            
            if($typeDrive == 1){

                if($this->tipoUso == "particular" && $_SESSION['valorCotacaoFipe'] <= 80000){
                    
                    $this->valorAdsao = 300;
              
                }
                
            }

            if($typeDrive == 2){

                if($this->tipoUso == "particular" && $_SESSION['valorCotacaoFipe'] <= 20000){
                    
                    $this->valorAdsao = 300;
              
                }
                
            }

            if($typeDrive == 3){

                if($this->tipoUso == "aluguel" && $_SESSION['valorCotacaoFipe'] <= 80000){
                    
                    $this->valorAdsao = 300;
              
                }
                
            }
        }
    }
}

?>