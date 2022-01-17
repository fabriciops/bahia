<?php
error_reporting(E_ALL);

class Veículo
{
    private $tipo, $marca, $modelo, $ano, $combustível, $url, $parâmetros;
    
    public function setTipo($value)
    {
        $this->tipo = $value;
    }

    public function setMarca($value)
    {
        $this->marca = $value;
    }

    public function setModelo($value)
    {
        $this->modelo = $value;
    }

    public function setAno($value)
    {
        $this->ano = $value;
    }

    public function setCombustível($value)
    {
        $this->combustível = $value;
    }

    public function setUrl($value)
    {
        $url["referência"] = "https://veiculos.fipe.org.br/api/veiculos//ConsultarTabelaDeReferencia";
        $url["marca"] = "https://veiculos.fipe.org.br/api/veiculos//ConsultarMarcas";
        $url["modelo"] = "https://veiculos.fipe.org.br/api/veiculos//ConsultarModelos";
        $url["anomodelo"] = "https://veiculos.fipe.org.br/api/veiculos//ConsultarAnoModelo";
        $url["valor"] = "https://veiculos.fipe.org.br/api/veiculos//ConsultarValorComTodosParametros";
        $this->url = $url[$value];
    }

    public function setParâmetros($value)
    {
        $this->parâmetros = array(
            "tipoConsulta"=>"tradicional",
        );

        if ($value != "referência") {
            $referencia_atual = json_decode($this->consulta("referência"))[0]->Codigo;            
            $this->parâmetros['codigoTabelaReferencia'] = $referencia_atual;
        }
        
        if (isset($this->tipo)) {
            $this->parâmetros['codigoTipoVeiculo'] = $this->tipo;
        }

        if (isset($this->marca)) {
            $this->parâmetros['codigoMarca'] = $this->marca;
        }

        if (isset($this->modelo)) {
            $this->parâmetros['codigoModelo'] = $this->modelo;
        }

        if (isset($this->ano)) {
            $this->parâmetros['anoModelo'] = $this->ano;
        }

        if (isset($this->combustível)) {
            $this->parâmetros['codigoTipoCombustivel'] = $this->combustível;
        }
    }

    public function consulta ($value) {
        

        $ch = curl_init();

        $this->setParâmetros($value);
        $this->setUrl($value);

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);

        $this->setUrl($value);
        $this->setParâmetros($value);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->parâmetros));

        $result = curl_exec($ch);

        curl_close ($ch);

        return $result;
    }
}
?>