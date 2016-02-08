<!--Elementos que s emuestran en la parte superior del dasboard de ventas-->
<div class="row" >
<div class="col m3 s12">
  <div class="card-panel z-depth-3">
    <div id="numero_top_facturas">
      <h5  style="margin-top:-10px; "><i class="material-icons left teal lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $facturas; ?></h5>
    </div>
    <div id="numero_top_facturas_total">
      <p style="margin-bottom:-20px; margin-left:30%;">Total de Facturas</p>
    </div>
  </div>
</div>
<div class="col m3 s12">
  <div class="card-panel z-depth-3">
    <div id="numero_top_ordenes">
      <h5 style="margin-top:-10px; "><i class="material-icons left red lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $ordenes; ?></h5>
    </div>
      <div id="numero_top_ordenes_total">
        <p style="margin-bottom:-20px; margin-left:30%;">Total de Ordenes</p>
      </div>

  </div>
</div>
<div class="col m3 s12">
  <div class="card-panel z-depth-3">
    <div id="numero_top_ofertas">
      <h5 style="margin-top:-10px; "><i class="material-icons left blue lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $ofertas; ?></h5>
    </div>
      <div id="numero_top_ofertas_total">
        <p style="margin-bottom:-20px; margin-left:30%;">Total de Ofertas</p>
      </div>
  </div>
</div>
<div class="col m3 s12">
  <div class="card-panel z-depth-3">
    <div id="numero_top_back">
      <h5 style="margin-top:-10px; "><i class="material-icons left purple lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $back; ?></h5>
    </div>
    <div id="numero_top_back_total">
      <p style="margin-bottom:-20px; margin-left:30%;">Total Back Order</p>
    </div>
  </div>
</div>
</div>
