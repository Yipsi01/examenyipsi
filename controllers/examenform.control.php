<?php
  require_once "models/examendata.model.php";
  function run()
  {
      $yyam_estado = obtenerEstados();
      $selectedEst = 'ACT';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "Contratos ",
        "INS" => "Creando Nuevo Contrato",
        "UPD" => "Actualizando Contrato ",
        "DEL" => "Eliminando  Contrato"
      );
      $viewData = array();
      $viewData["showcodContrato"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=examenlist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $paginas = obtenerContratosPorId($_POST["codContrato"]);
          $selectedEst=$moda["estadoContrato"];
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($paginas, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["codContrato"];
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";
          //Vamos A Cargar los datos
          $contratos = obtenerContratosPorId($_POST["codContrato"]);
          $selectedEst=$contratos["estadoContrato"];
          mergeFullArrayTo($contratos, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["codContrato"];
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";
          //Vamos A Cargar los datos
          $contratos = obtenerContratosPorId($_POST["codContrato"]);
          $selectedEst=$contratos["estadoContrato"];
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["codContrato"];
      }




      if (isset($_POST["btnIns"])) {
          $mode = "INS";
          //Vamos A Cargar los datos
          $viewData["modeDsc"] = $modeDesc[$mode];
           $viewData["showcodContrato"]  = false;
      }


      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["estaodContrato"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              if (!$hasError && agregarNuevoContrato(
                  $viewData["fchContrato"],
                  $viewData["nombreEmpContrato"],
                  $viewData["numIdeContrato"],
                  $viewData["durMeserContrato"],
                  $viewData["tipoContrato"],
                  $viewData["sueldoBaseContrato"],
                  $viewData["renovableContrato"],
                  $viewData["estadoContrato"],
              )
              ) {
                  redirectWithMessage(
                      "Contrato Guardado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'UPD':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["codContarto"];
              if (modificarContratos(
                $viewData["fchContrato"],
                $viewData["nombreEmpContrato"],
                $viewData["numIdeContrato"],
                $viewData["durMeserContrato"],
                $viewData["tipoContrato"],
                $viewData["sueldoBaseContrato"],
                $viewData["renovableContrato"],
                $viewData["estadoContrato"],
                  $viewData["codContrato"]
              )
              ) {
                  redirectWithMessage(
                      "Contrato Actualizado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["codContrato"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminarContratos(
                  $viewData["codContrato"]
              )
              ) {
                  redirectWithMessage(
                      "Contrato Eliminado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["estadoContrato"] = addSelectedCmbArray($estadoContrato, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("examenform", $viewData);
  }
  run();
?>
