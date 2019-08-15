<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.

/*CREATE TABLE `contratos` (
  `codContrato` BIGINT(13) NOT NULL AUTO_INCREMENT,
  `fchContrato` DATE,
  `nombreEmpContrato` varchar(150) NULL,
  `numIdeContrato` VARCHAR(20) NULL,
  `durMeserContrato` INT(5) NULL,
  `tipoContrato` CHAR(3) NULL,
  `sueldoBaseContrato` DECIMAL(13,4) NULL,
  `renovableContrato` CHAR(3) NULL,
  `estadoContrato` CHAR(3) NULL,
  PRIMARY KEY (`codContrato`));

/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerListas()
{
   $sqlstr = "select `contratos`.`codContrato`,
   `contratos`.`fchContrato`,
   `contratos`.`nombreEmpContrato`,
   `contratos`.`numIdeContrato`,
   `contratos`.`durMeserContrato`,
   `contratos`.`tipoContrato`,
   `contratos`.`sueldoBaseContrato`,
   `contratos`.`renovableContrato`,
   `contratos`.`estadoContrato`
FROM `examenyipsi`.`contratos` where codContrato=%d";

   $contratos = array();
   $contratos = obtenerRegistros($sqlstr);
   return $contratos;
}

function obtenerContratosPorId($codContrato)
{
 $sqlstr="select `contratos`.`codContrato`,
 `contratos`.`fchContrato`,
 `contratos`.`nombreEmpContrato`,
 `contratos`.`numIdeContrato`,
 `contratos`.`durMeserContrato`,
 `contratos`.`tipoContrato`,
 `contratos`.`sueldoBaseContrato`,
 `contratos`.`renovableContrato`,
 `contratos`.`estadoContrato`
FROM `examenyipsi`.`contratos`where codContrato=%d";

 $contratos= array();
 $contratos=obtenerUnRegistro(sprintf($sqlstr));
 return $contratos;
}

function obtenerEstadoPorId($codContrato)
{
 $sqlstr="select `contratos`.`estadoContrato`
       from `examenyipsi`.`contratos` where codContrato=%d";
 $contratos= array();
 $contratos=obtenerUnRegistro(sprintf($sqlstr));
 return $contratos;
}


function obtenerEstados()
{
   return array(
       array("cod"=>"NEG", "dsc"=>"Negociación"),
       array("cod"=>"VGT", "dsc"=>"Vigente"),
       array("cod"=>"TRM", "dsc"=>"Terminado"),
       array("cod"=>"FNQ", "dsc"=>"Finiquitado")
   );
}

function agregarNuevoContrato($fchContrato, $nombreEmpContrato, $numIdeContrato, $durMeserContrato,
$tipoContrato, $sueldoBaseContrato, $renovableContrato, $estadoContrato) {
   $insSql = "INSERT INTO contratos (fchContrato, nombreEmpContrato, numIdeContrato, durMeserContrato,
   tipoContrato, sueldoBaseContrato, renovableContrato, estadoContrato)
     values ('%date','%s','%s','%d','%s' %f, '%s', '%s');";
     if (ejecutarNonQuery(
         sprintf(
             $insSql,
             $viewData["fchContrato"],
             $viewData["nombreEmpContrato"],
             $viewData["numIdeContrato"],
             $viewData["durMeserContrato"],
             $viewData["tipoContrato"],
             $viewData["sueldoBaseContrato"],
             $viewData["renovableContrato"],
             $viewData["estadoContrato"]

         )))
     {
       return getLastInserId();
     } else {
         return false;
     }
}

function modificarContratos($fchContrato, $nombreEmpContrato, $numIdeContrato, $durMeserContrato,
$tipoContrato, $sueldoBaseContrato, $renovableContrato, $estadoContrato, $codContrato)
{
   $updSQL = "UPDATE contratos set  fchContrato='%date', nombreEmpContrato='%s',
   numIdeContrato='%s', durMeserContrato=%d,
   tipoContrato='%s', sueldoBaseContrato=%f, renovableContrato='%s', estadoContrato='%s'
   where codContrato=%d;";

   return ejecutarNonQuery(
       sprintf(
           $updSQL,
           $viewData["fchContrato"],
           $viewData["nombreEmpContrato"],
           $viewData["numIdeContrato"],
           $viewData["durMeserContrato"],
           $viewData["tipoContrato"],
           $viewData["sueldoBaseContrato"],
           $viewData["renovableContrato"],
           $viewData["estadoContrato"],
           $codContrato
       )
   );
}
function eliminarContratos($codContrato)
{
   $delSQL = "DELETE FROM Contratos where codContrato=%d;";

   return ejecutarNonQuery(
       sprintf(
           $delSQL,
           $codContrato
       )
   );
}
?>
