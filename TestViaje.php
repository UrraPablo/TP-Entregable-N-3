<?php
// ******* TestViaje *************
/** Prueba el comportmiento de la clase Viaje */
include("Viaje.php");
include("Pasajeros.php");
include("Responsable.php");
include("ViajeTerrestre.php");
include("ViajeAereo.php");

/** METODO CARGAR DATOS 
 * Realiza la carga de datos de los pasajeros.
 * @return array  
 */
function cargaPasajeros(){
    // INT: cantPasajeros, i
    $nombres=array("Pablo","Daniela","Jose","Agustina","Tamara","Alberto","Josefina","Luis","Mirian","Alejandro","Camila","Carlos","Karina","Laura");
    $apellidos=array("Urra","Contreras","Bonfanti","Gallo","Herrera","Urrutia","Ceballos","Saez","Gutierrez","Cabezas","Gonzales","Chostqui","Claros","Genovese");
    $dnis=array(33233814,39051789,38533019,33143839,41233514,31233817,33230014,33275314,31233819,32233714,33233409,33233800,42233814,33257814);
    $telefonos=array(2994000111,2994000911,2994007111,2994003911,2994000771,2994000199,2994870111,2994009811,2994170111,2996800111,2995000111,2994333111,2994000100,2994000110);
    $cantPasajeros=4; // TIENE QUE SER MENOR QUE 14 (CANTIDAD DE NOBRES, APELLIDOS, TELEFONOS Y DNI)

    // llenado del array multidimensional pasajeros
    for ($i=0; $i<$cantPasajeros;$i++){
        $c=rand(0,13); // selecciona un numero entre 0 y 13 aleatoriamente
        $pasajeros[$i]=new Pasajeros($nombres[$c],$apellidos[$c],$dnis[$c],$telefonos[$c]);// creacion de array de objetos

    } // fin for 

    return $pasajeros; 
}// fin metodo cargaPasajeros

/** Menu de opciones 
 * Muestra en pantalla las opciones a la que el usuario puede optar.
 * @return int
 */
function menuOpciones(){
    echo("\n");
    echo("---------- ELIJA EL NUMERO DE OPCIÓN AL QUE QUIERE INGRESAR----------\n");
    echo(" 1) Cambiar datos \n");
    echo(" 2) Mostrar datos \n");
    echo(" 3) Vender pasaje a un pasajero\n");
    echo(" 4) Salir\n"); 
    echo("-----------------------------------------------------------------------\n");
    $opcion=trim(fgets(STDIN));

    while($opcion>=1 && $opcion<=5){
        return $opcion;

    }// fin while 

}// fin menuOpciones


/**---------- PROGRAMA PRINCIPAL ------------**/
//INT: numOpcion, cambio, k, contar     STRING:      BOOLEAN: salir     ARRAY: viajeros, pasajero1    OBJETOS: viaje,

$numOpcion=menuOpciones(); // llama al metodo menuOpciones para elegir la opcion a ingresar
$salir=false; // opcion para salir del menu de opciones 
$viajeros=cargaPasajeros();// array multidimensional de objetos  pasajeros

// CREACION DEL OBJETO DE LA CLASE VIAJE
$objViaje= new Viaje(1234,"Bariloche",42,$viajeros,2500,"ida");  

// CREACION DEL OBJETO RESPONSABLE
$objResponsable=new Responsable("Jose","Gonzales",9125,157);



while($salir==false){
switch ($numOpcion){
    case 1:  // MODIFICA LOS DATOS DEL VIAJE O LOS DEL PASAJERO
        echo("¿Quiere cambiar los datos del pasajero (1) o del viaje (2)?\n");
        $cambio=trim(fgets(STDIN));
        if ($cambio==1){
            $objPasajeroModificado=$objViaje->modificarPasajero($viajeros);// DEVUELVE EL OBJETO PASAJERO CON LOS DATOS MODIFICADOS
            echo("Datos del pasajero modificado: \n");
            echo($objPasajeroModificado);
        }// fin if 
        else{
            $objViaje->modificarViaje();  // MODIFICA LOS DATOS DEL VIAJE (USA LOS METODOS SET PARA LOS MISMOS) 
            echo("\n");
            echo($objViaje); // llama al metodo toString para mostrar los datos modificados del viaje


        }// fin else 
        break;
        
        case 2:  // MUESTRA LOS DATOS DE LOS PASAJEROS Y LOS DATOS DEL VIAJE
            echo("Datos del Viaje: \n");
            echo($objViaje); // Muestra en pantalla los datos del viaje
            echo("----------------------\n");
            echo("Datos del responsable del Viaje\n");
            echo($objResponsable."\n");
            echo("------------------------\n");
           
            echo("Datos de los pasajeros: \n");
            $arrObjViajeros=$objViaje->getPasajeros();
            for($k=0; $k<sizeof($arrObjViajeros);$k++){ // PARA RECORRER EL ARRAY MULTIDIMENSIONAL  Y MOSTRAR LOS DATOS DE LOS PASAJEROS
                echo($arrObjViajeros[$k]."\n");
                echo("--------------------------\n");
            }// fin for
            break;
            
            case 3:  // *************VENTA DE PASAJE******************* 
                
                $hayViajeParaVender=$objViaje->hayViajeDisponible(); // llama al metodo para saber si hay viajes disponibles para la venta
                if($hayViajeParaVender){
                    $nuevoPasajero=$objViaje->agregarPasajero(); // almacena al nuevo obj pasajero
                    echo("¿Usted va a viajar en bus (1) o en avion (2)?\n");
                    echo("Elija un número \n");
                    $transporte=trim(fgets(STDIN));
                    if($transporte==1){ //*********** */ VIAJE TERRESTRE **********
                    echo("Quiere asientos semi-cama (1) o cama (2) \n");
                    $asiento=trim(fgets(STDIN));
                    if($asiento==1){
                        $tipo="semi-cama";

                    }// fin if 
                    else{
                        $tipo="cama";

                    }// fin else
                    $objViajeTerrestre=new ViajeTerrestre(1234,"Bariloche",42,$viajeros,2500,"ida",$tipo);

                    $importe=$objViajeTerrestre->venderPasajero($nuevoPasajero); 
                    echo("El costo del pasaje es: $".$importe."\n");

                }// fin if 
                else{ // ******VIAJE AEREO********
                    echo("Usted quiere viajar en primera clase (1) o clase economica (2) \n");
                    echo("Elija un numero \n");
                    $clase=trim(fgets(STDIN));
                    if ($clase==1){
                        $objViajeAereo=new ViajeAereo(1234,"España",38,$viajeros,3000,"idaYvuelta",378,0,"primeraClase","Latam");
                        $importe=$objViajeAereo->venderPasajero($nuevoPasajero);
                        echo("El costo del viaje es de: $".$importe."\n");
                        


                    }// fin if 
                    else{
                        $objViajeAereo=new ViajeAereo(1234,"España",38,$viajeros,3000,"idaYvuelta",378,0,"economica","Latam");
                        $importe=$objViajeAereo->venderPasajero($nuevoPasajero);
                        echo("El costo del viaje es de: $".$importe."\n");


                    }// fin else 

                }// fin else


                }// fin if 
                else{
                    echo("No hay viajes disponibles para la venta \n"); 
                }// fin else


                break;   

            case 4: 
                $salir=true;
                break; 


}// fin switch
echo("Desea realizar otra operación: Si / No\n");
echo("-----------------------------------------\n");
$si=strtoupper(trim(fgets(STDIN)));
if($si=="SI"){
    $salir=false;
    $numOpcion=menuOpciones();

}// fin if 
else{
    $salir=true; 
}

}// fin while 




?>