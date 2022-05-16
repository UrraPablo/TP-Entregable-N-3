<?php
// CLASE VIAJE AEREO
class ViajeAereo extends Viaje{

    private int $nroVuelo;
    private int $cantEscala;
    private string $categoriaAsiento;
    private string $nombreAerolinea;

    // METODO CONSTRUCTOR 
    public function __construct($codigo,$destino,$asientos,$pasajeros,$importe,$tipoViaje,$nro,$escala,$asiento,$nombre)
    {
        parent::__construct($codigo,$destino,$asientos,$pasajeros,$importe,$tipoViaje);
        $this->nroVuelo=$nro;
        $this->cantEscala=$escala;
        $this->categoriaAsiento=$asiento;
        $this->nombreAerolinea=$nombre;
        
    }// fin metodo constructor 

    // METODOS GET
    public function getNroVuelo(){
        return $this->nroVuelo;
    }// fin metodo get

    public function getCantEscala(){
        return $this->cantEscala;
    }// fin metodo get

    public function getCategoriaAsiento(){
        return $this->categoriaAsiento;
    }// fin metodo get

    public function getAerolinea(){
        return $this->nombreAerolinea;
    }// fin metodo get

    // METODOS SET

    public function setNroVuelo($n){
        $this->nroVuelo=$n;
    }// fin metodo set

    public function setCantEscala($escala){
        $this->cantEscala=$escala;
    }// fin metodo set

    public function setCatAsiento($categoria){
        $this->categoriaAsiento=$categoria;
    }// fin metodo set

    public function setAerolinea($name){
        $this->nombreAerolinea=$name;
    }// fin metodo set


    /** metodo vender vuelo
     * Heredado de la clase viaje 
     * @param obj pasajero
     * @return float
     */
    public function venderPasajero($pasajero)
    {
        // STRING: viajeTipo 

        $viajeTipo=parent::getTipoViaje(); // almacena el tipo de viaje de la clase padre (Viaje)
        $costo=parent::getImporte(); // el importe del viaje (sin loa aumentos de la clase vuelo)
        $disponible=parent::hayViajeDisponible(); // invocsa al metodo hayDisponible de la clase Viaje
        $categoria=$this->getCategoriaAsiento(); // almacena el tipo de categoria del asiento (1era clase o clase turistica)
        $escala=$this->getCantEscala(); // almacena la cantidad de escala del vuelo

        if($disponible){

            if($categoria=="primeraClase"){
                if($escala==0){
                    $costo=$costo + $costo*0.4;;

                }// fin if 
                else{
                    $costo=$costo + $costo*0.6;

                }// fin else 

            }// fin if

        }// fin if
        else{
            echo("no hay pasajes disponibles para la venta\n");
        }// fin else

        return $costo;

    }// fin metodo vender pasajero



    // METODO TO STRING 
    public function __toString()
    {
        $cadena=parent::__toString();
        return " ".$cadena."\n".
        "El vuelo de: ".$this->getAerolinea().", con Nro de vuelo: ".$this->getNroVuelo()." .Con ".$this->getCantEscala()." escalas".
        "El vuelo posee  asientos de ".$this->getCategoriaAsiento()."\n";
    }// fin to string 


}// fin clase ViajeAereo

?>