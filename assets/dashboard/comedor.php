<!-- Comedor  y sección superior informativa para empleados dentro de la oficina-->
<div class="row">
  <div class="col m4 s12">
    <div class="card small">
          <div class="card-image">
            <img src="../img/avisos/excel.jpg" style="height:60%; width:100%;">
          </div>
          <div class="card-content">
            <h5>Curso Excel Avanzado</h5>
            <p>Gracias por su asistencia.</p>
          </div>
        </div>
  </div>
  <div class="col m5 s12">
    <div class="card small">
          <div class="card-image">
            <img src="../img/avisos/mantenimiento.png" style="height:60%; width:100%;">
          </div>
          <div class="card-content">
            <h5>Mantenimiento Equipo de Cómputo</h5>
            <p><?php
            switch ($_SESSION['Nombre_Usuario']) {
              case 'Jesus Govea':
                echo "Sábado 06 de Febrero de 2016";
                break;
                case 'Veronica Murillo':
                  echo "Realizado el Sábado 30 de Enero de 2016";
                  break;
                  case 'Sebastian Gonzalez':
                    echo "Realizado el  Sábado 30 de Enero de 2016";
                    break;
                    case 'Leonardo Balderas':
                      echo "Realizado el  Sábado 30 de Enero de 2016";
                      break;
                      case 'Jorge Cuellar':
                        echo "Sábado 06 de Febrero de 2016";
                        break;
                        case 'Said Hernandez':
                          echo "Sábado 06 de Febrero de 2016";
                          break;
                          case 'Bibiana Poumian':
                            echo "Sábado 06 de Febrero de 2016";
                            break;
                            case 'Cesar Correa':
                              echo "Sábado 13 de Febrero de 2016";
                              break;
                              case 'Alejandro Montes':
                                echo "Sábado 13 de Febrero de 2016";
                                break;
                                case 'Elizabeth Ortega':
                                  echo "Sábado 13 de Febrero de 2016";
                                  break;
                                  case 'Susana Ricarte':
                                    echo "Sábado 13 de Febrero de 2016";
                                    break;
              default:
                # code...
                break;
            }
             ?></p>
          </div>
        </div>
  </div>
  <div class="col m3 s12" <?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>
    <div class="card small">
          <div class="card-image">
            <img src="../img/food.jpg"  height="300px" width="992px">
            <span class="card-title">Platillo del día</span>
          </div>
          <div class="card-content">
            <p><?php
            $dia = date('N');
              $sql = mysql_query("SELECT * FROM menu WHERE ID = $dia and Usuario = '".$_SESSION['Nombre_Usuario']."'", $_SESSION['conn']);
              while ($row = mysql_fetch_array($sql))
              {
                  echo $row['Platillo'];
                  echo "<br>" . $row['Complemento'];
                  echo "<br>" . $row['Postre'];
              }
             ?></p>
          </div>
        </div>
  </div>
</div>
