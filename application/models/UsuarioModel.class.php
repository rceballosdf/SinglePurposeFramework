<?php
class UsuarioModel{
    private $Id;
    private $Nombre;
    private $Correo;
    private $Password;
    private $Root;
    private $UsuarioAltaId;
    private $FechaAlta;
    private $UsuarioModificaId;
    private $FechaModificacion;
    private $Activo;
    private $FechaDesactivacion;
    public function __construct(){
        $this->Id=0;
        $this->Nombre="";
        $this->Correo="";
        $this->Password="";
        $this->Root=false;
        $this->UsuarioAltaId=0;
        $this->FechaAlta=null;
        $this->UsuarioModificaId=0;
        $this->FechaModificacion=null;
        $this->Activo=0;
        $this->FechaDesactivacion=null;
    }
}
?>