<?php
// Clase ViajeTerrestre
class ViajeTerrestre extends Viaje{

    // Atributos
    private String $tipoAsiento; // define si el asiento de cama o semi cama 

    // Cosntructor 
    public function __construct($codigo,$destino,$asientos,$pasajeros,$importe,$tipoViaje,$asiento)
    {
        parent:: __construct($codigo,$destino,$asientos,$pasajeros,$importe,$tipoViaje);
        $this->tipoAsiento=$asiento;
        
    }// fin constructor

    // METODO GET
    public function getTipoAsiento(){
       return $this->tipoAsiento;
    }// fin metodo get

    // METODO SET
    public function setTipoAsiento($tipo){
        $this->tipoAsiento=$tipo;
    }// fin metodo set


    /**METODO VENDER PASAJERO 
     * @return double
    */
    public function venderPasajero($pasajero)
    {
        $costo=parent::venderPasajero($pasajero); // almacena el costo del vuelo sin los adicionales correspondientes
        $disponible=parent::hayViajeDisponible();

        if($disponible){
            if($this->getTipoAsiento()=="cama"){
                $costo=$costo + $costo*0.25;

            }// fin if 

        }// fin if 
        else{
            echo("No hay pasajes disponibles \n");

        }// fin else 
        return $costo;


    }// fin metodo vender pasajero


    /**METDO TO STRING 
     * @return String
     */
    public function __toString()
    {
        $texto=parent::__toString();
        return $texto."\n".
        "Tiene Asientos tipo ".$this->getTipoAsiento()."\n";
    }// fin metodo toString


}// fin clase ViajeTrerrestre

?>