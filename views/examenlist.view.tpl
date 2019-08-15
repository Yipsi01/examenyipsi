<section>
  <header>
    <h1>Lista de Contratos</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Fecha</th>
          <th>Nombre</th>
          <th>Número ID</th>
          <th>Duración</th>
          <th>Tipo</th>
          <th>Sueldo Base</th>
          <th>Renovación</th>
          <th>Estado</th>

          <th class="right">
            <form action="index.php?page=examenform" method="post">
            <input type="hidden" name="yyam_codigo" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach paginas}}
        <tr>
          <td>{{codContrato}}</td>
          <td>{{fchContrato}}</td>
          <td>{{nombreEmpContrato}}</td>
          <td>{{numIdeContrato}}</td>
          <td>{{durMeserContrato}}</td>
          <td>{{tipoContrato}}</td>
          <td>{{sueldoBaseContrato}}</td>
          <td>{{renovableContrato}}</td>
          <td>{{estadoContrato}}</td>

          <td class="right">
            <form action="index.php?page=examenform" method="post">
              <input type="hidden" name="codContrato" value="{{codContrato}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor contratos}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
