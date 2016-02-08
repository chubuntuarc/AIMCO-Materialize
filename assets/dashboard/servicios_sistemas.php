<!-- Servicios Sistemas es toda la información mostrada en el dashboard del área de sistemas-->
<div class="row">
  <div class="col m4 s12">
    <div class="card-panel">
      <h5>Notas</h5>
      <table>
        <tbody>
          <tr>
            <td><p>
              <input type="checkbox" id="test5" />
              <label for="test5">Nota de ejemplo</label>
            </p></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col m8 s12">
    <div class="card-panel">
      <h5>Reportes de Usuarios</h5>
      <table>
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Problema</th>
            <th>Notas</th>
            <th>Notas</th>
            <th>Completo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Soporte IT</td>
            <td>Equipo Lento</td>
            <td>Esta lenta la maquina</td>
            <td><input type="text" name="name" placeholder="Descripción Solución"></td>
            <td><p><input type="checkbox" id="test5" /><label for="test5">Completo</label></p></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/tops_servicios.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Top Asistencia por Usuario<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Top Asistencia por Usuario<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Nombre</th>
        <th>Servicios / Semana</th>
      </thead>
    </table>
  </div>
</div>
  </div>
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/blue.png">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Top Problemas Comunes<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Top Problemas Comunes<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Conflicto</th>
        <th>Categoría</th>
        <th>Eventos / Mes</th>
      </thead>
    </table>
  </div>
</div>
  </div>
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/visitas.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Top Sitios Web<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Top Sitios Web<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Sitio</th>
        <th>Visitas / Semana</th>
      </thead>
    </table>
  </div>
</div>
  </div>
</div>
<div class="row" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>
  <div class="col m6 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/stock.png">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Inventario Sistemas<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Inventario Sistemas<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Departamento</th>
        <th>Cantidad</th>
      </thead>
      <tbody>
        <?php
        $sql = "";
        $sql = mysql_query("SELECT * FROM inventario_sistemas ORDER BY categoria asc ", $_SESSION['conn']);
        while($rs=mysql_fetch_array($sql))
            {
              echo "<tr>";
              echo "<td>".$rs[0]."</td>";
              echo "<td>".$rs[1]."</td>";
              echo "<td>".$rs[2]."</td>";
              echo "<td>".$rs[3]."</td>";
              echo "<td>".$rs[4]."</td>";
              echo "</tr>";
            }
          ?>
      </tbody>
    </table>
  </div>
</div>
  </div>
  <div class="col m6 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/code.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Desarrollo<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Desarrollo<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>Repositorio</th>
        <th>Usuario</th>
        <th>Commit</th>
        <th>Fecha</th>
      </thead>
    </table>
  </div>
</div>
  </div>
</div>
