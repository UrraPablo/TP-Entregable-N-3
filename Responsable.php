<?php
// CLASE RESPONSBLE|
class Responsable{
// ATRIBUTO
private int  $nroEmpleado; 
private int $nroLicencia;
private string $nombre;
private string $apellido; 

// METODO COSNTRUCTOR
public function __construct($name,$apell,$nroEM,$nroLic)
{
    $this->nroEmpleado=$nroEM;
    $this->nroLicencia=$nroLic;
    $this->nombre=$name;
    $this->apellido=$apell;
}// fin constructor

// METODOS GET

public function getNroEmpleado(){
    return $this->nroEmpleado;
}// fin metodo get

public function getNroLicencia(){
    return $this->nroLicencia;
}// fin metodo get

public function getNombre(){
    return $this->nombre;
}// fin metodo get

public function getApellido(){
    return $this->apellido;
}// fin metodo get

// METODOS SET

public function setNroEmpleado($nroE){
    $this->nroEmpleado=$nroE;
}// fin metodo set

public function setNroLicencia($nroL){
    $this->nroLicencia=$nroL;
}// fin metodo set

public function setNombre($nom){
    $this->nombre=$nom;
}// fin metodo set

public function setApellido($ap){
    $this->apellido=$ap;
}// fin metodo set


// METODO TO STRING
public function __toString()
{
    return "Responsable del viaje ".$this->getNombre()."  ".$this->getApellido()."\n"
    ."N° de empleado: ".$this->getNroEmpleado()." Su N° de licencia es: ".$this->getNroLicencia()."\n";
}// fin toString



}// fin clase Respomsable
?>