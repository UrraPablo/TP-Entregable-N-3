<?php
// CLASSE PASAJERO
class Pasajeros{
    // ATRIBUTOS 
    private $nombre; //string
    private $apellido;// string
    private $dni; // int
    private $telefono; // int

    //METOPDO CONSTRUCTOR
    public function __construct($nombre,$apellido,$dni,$telefono)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
        $this->telefono=$telefono;
        
    } // fin metodo constructor

    // METODOS GET
    public function getNombre(){
        return $this->nombre;
    }// fin metodo get

    public function getApellido(){
        return $this->apellido;
    }// fin metodo get

    public function getDni(){
        return $this->dni;
    }// fin metodo get

    public function getTelefono(){
        return $this->telefono;
    }// fin metodo get

    // METODOS SET

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }// fin metodo  set

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }// fin metodo  set

    public function setDni($dni){
        $this->dni=$dni;
    }// fin metodo  set

    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }// fin metodo  set

    // METODO TO STRING 
    public  function __toString()
    {
        return "Nombre: ".$this->getNombre()."\n"
        ."Apellido: ".$this->getApellido()."\n"
        ."DNI: ".$this->getDni()."\n"
        ."Telefono: ".$this->getTelefono()."\n";
    }// fin metodo toString

}// fin clase pasajeros

?>