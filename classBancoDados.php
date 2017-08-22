<?php


class classBancoDados
{

    protected $ConexaoBanco;
    protected $IdServidor;
    protected $NumeroUltimoErro;
    protected $DescricaoErro;
    protected $ComandoSQL;
    protected $DataSet;
    protected $NumeroRegistros;


    function __construct($Servidor = "")
    {

        $this->ConexaoBanco = null;
        $this->NumeroUltimoErro = -1;
        $this->DescricaoErro = "";
        $this->DataSet = null;
        $this->NumeroRegistros = 0;

        if ($Servidor === "") {
            $this->IdServidor = "localhost";
        } else {
            $this->IdServidor = $Servidor;
        }
    }

    public function ABrirConexao()
    {
        $this->ConexaoBanco = new mysqli($this->IdServidor, "root", "", "hoteis");

        if (mysqli_connect_errno() != 0) {
                $this->ConexaoBanco = null;
                $this->NumeroUltimoErro = mysqli_connect_errno();
                $this->DescricaoErro = mysqli_connect_error();
                return false;
        } else {
            $this->ConexaoBanco->set_charset("utf8");
            return $this->ConexaoBanco;
        }
    }

    public function CodigoErro()
    {
        return $this->DescricaoErro;
    }

    public function MensagemErro()
    {
        return $this->DescricaoErro;
    }

    public function FecharConexao()
    {
        if ($this->ConexaoBanco === null) {
            return false;
        }
        $this->ConexaoBanco->close();
    }

    public function SetSELECT($Campo = "",$Tabela = "",$CampoOrdenado = ""){
        if(($Campo != "") && ($Tabela != "")){
            $this->ComandoSQL = "SELECT ".$Campo." FROM ".$Tabela;

            if($CampoOrdenado != ""){
                $this->ComandoSQL .=" ORDER BY ";
                $this->ComandoSQL .=$CampoOrdenado;
            }
        }
    }

    public function ExecSELECT(){
        if($this->ComandoSQL != ""){
            $this->DataSet = $this->ConexaoBanco->query($this->ComandoSQL);

            if($this->DataSet){
                $this->NumeroRegistros = $this->DataSet->num_rows;
            }
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function TotalRegistros(){
        return $this->NumeroRegistros;

    }
    public function GetDataSet(){
        return $this->DataSet;
        
        }
}
