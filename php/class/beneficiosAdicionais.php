<?php

class BeneficioAdicionais{

    public $assistencia;
    public $assistenciaTrezentos;
    public $assistenciaOitocentos;

    public $parabrisaNacionaUmAno;
    public $parabrisaNacionaDoisAnos;
    public $parabrisaNacionaTresAnos;

    public $danosTerceiros;
    public $assistenciaFuneral;
    public $carroReserva;
    public $vidrosLateraisTraseiros;
    public $vidrosLateraisTraseiroImportado;
    public $farolLanternaRetrovisor;
    public $farolLanternaRetrovisorImportado;

    
    function __construct(){

        $this->assistencia = 2;
        $this->assistenciaTrezentos = 6;
        $this->assistenciaOitocentos = 8;

        $this->parabrisaNacionaUmAno = 10;
        $this->parabrisaNacionaDoisAnos = 13;
        $this->parabrisaNacionaTresAnos = 17;

        // $this->parabrisaImportado;
        $this->danosTerceiros;
        $this->assistenciaFuneral;
        $this->carroReserva;
        $this->vidrosLateraisTraseiros;
        $this->vidrosLateraisTraseiroImportado;
        $this->farolLanternaRetrovisor;
        $this->farolLanternaRetrovisorImportado;

    }

    public function getAssistenciaCem(){

        return $this->assistencia;
    }

    public function getAssistenciaTrezentos(){

        return $this->assistenciaTrezentos;
    }

    public function getAssistenciaOitocentos(){

        return $this->assistenciaOitocentos;
    }

    // set
    public function setAssistenciaCem($assistencia){

        $this->assistencia = $assistencia;
    }

    public function setAssistenciaTrezentos($assistencia){

        $this->assistenciaTrezentos = $assistencia;
    }

    public function setAssistenciaOitocentos($assistencia){

        $this->assistenciaOitocentos = $assistencia;
    }

    // get

    public function getparabrisaNacionaUmAno(){

        return $this->parabrisaNacionaUmAno;
    }

    public function getparabrisaNacionaDoisAnos(){

        return $this->parabrisaNacionaDoisAnos;
    }

    public function getparabrisaNacionaTresAnos(){

        return $this->parabrisaNacionaTresAnos;
    }

    // set
    public function setparabrisaNacionaUmAno($parabrisaNacionaUmAno){

        $this->parabrisaNacionaUmAno = $parabrisaNacionaUmAno;
    }

    public function setparabrisaNacionaDoisAnos($parabrisaNacionaDoisAnos){

        $this->parabrisaNacionaDoisAnos = $parabrisaNacionaDoisAnos;
    }

    public function setparabrisaNacionaTresAnos($parabrisaNacionaTresAnos){

        $this->parabrisaNacionaTresAnos = $parabrisaNacionaTresAnos;
    }


}
