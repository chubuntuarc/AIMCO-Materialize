<!-- Servicios Sistemas es toda la información mostrada en el dashboard del área de sistemas-->
<div class="row">
  <div class="col m4 s12">
    <div class="card-panel">
      <h5>Tareas</h5>
      <table>
        <tbody>
          <tr>
            <td><p>
              <input type="checkbox" id="test5" />
              <label for="test5">Tarea Ejemplo</label>
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
<div class="row">
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
    <img class="activator" src="../img/sistemas/monitoreo.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Monitoreo Sistemas<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Monitoreo Sistemas<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Equipo</th>
        <th>Monitoreo Anterior</th>
        <th>Estado Anterior</th>
        <th>Ultimo Monitoreo</th>
        <th>Ultimo Estado</th>
      </thead>
    </table>
  </div>
</div>
  </div>
</div>
<div class="row">
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/mantenimiento.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Bitácora Mantenimiento<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Bitácora Mantenimiento<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Usuario</th>
        <th>Departamento</th>
        <th>Ultimo Mtto.</th>
        <th>Próximo Mtto.</th>
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
  <div class="col m4 s12">
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
</div>
<div class="row">
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/cursos.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Seguimiento Cursos<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Seguimiento Cursos<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Curso</th>
        <th>Fecha</th>
      </thead>
    </table>
  </div>
</div>
  </div>
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/checklist.jpg">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Seguimiento Tareas<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Seguimiento Tareas<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Tarea</th>
        <th>Comentario</th>
        <th>Fecha</th>
      </thead>
    </table>
  </div>
</div>
  </div>
  <div class="col m4 s12">
    <div class="card">
  <div class="card-image waves-effect waves-block waves-light">
    <img class="activator" src="../img/sistemas/avisos.png">
  </div>
  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">Disponible<i class="material-icons right">more_vert</i></span>
  </div>
  <div class="card-reveal">
    <span class="card-title grey-text text-darken-4">Espacio Disponible<i class="material-icons right">close</i></span>
    <table>
      <thead>
        <th>#</th>
        <th>Tarea</th>
        <th>Comentario</th>
        <th>Fecha</th>
      </thead>
    </table>
  </div>
</div>
  </div>
</div>
