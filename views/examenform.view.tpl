<h1>{{modeDsc}}</h1>
<section class="row">
<form action="index.php?page=examenform" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showIdcontratos}}
  <fieldset class="row">
    <label class="col-5" for="codContrato">Código de Contrato</label>
    <input type="text" name="codContrato" id="codContrato" readonly value="{{codContrato}}" class="col-7" />
  </fieldset>
  {{endif showIdcontratos}}

  <label class="col-5" for="fchContrato">Fecha de Contrato</label>
  <input type="text" name="fchContrato" id="fchContrato" readonly value="{{fchContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

<fieldset class="row">
  <label class="col-5" for="nombreEmpContrato">Nombre Empleado Contrato: </label>
  <input type="text" name="nombreEmpContrato" id="nombreEmpContrato" {{readonly}} value="{{nombreEmpContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

<fieldset class="row">
  <label class="col-5" for="numIdeContrato">Numero Id de Contrato: </label>
  <input type="text" name="numIdeContrato" id="numIdeContrato`" {{readonly}} value="{{numIdeContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

<fieldset class="row">
  <label class="col-5" for="durMeserContrato">Duracion meses de Contrato: </label>
  <input type="text" name="durMeserContrato" id="durMeserContrato" {{readonly}} value="{{durMeserContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

<fieldset class="row">
  <label class="col-5" for="tipoContrato">Tipo de Contrato: </label>
  <input type="text" name="tipoContrato" id="tipoContrato" {{readonly}} value="{{tipoContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

<fieldset class="row">
  <label class="col-5" for="sueldoBaseContrato">Sueldo Base de Contrato: </label>
  <input type="text" name="sueldoBaseContrato" id="sueldoBaseContrato" {{readonly}} value="{{sueldoBaseContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

<fieldset class="row">
  <label class="col-5" for="renovableContrato">Renovacion de Contrato: </label>
  <input type="text" name="renovableContrato" id="renovableContrato" {{readonly}} value="{{renovableContrato}}" class="col-7" />
</fieldset>
{{endif showIdcontratos}}

  <fieldset class="row">
    <label class="col-5" for="estadoContrato">Estado de Contrato</label>
    <select name="estadoContrato" id="estadoContrato" class="col-7" {{selectDisable}} {{readonly}} >
      {{foreach estadoContrato}}
        <option value="{{cod}}" {{selected}}>{{dsc}}</option>
      {{endfor estadoContrato}}
    </select>
  </fieldset>

  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>


</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=examenlist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
