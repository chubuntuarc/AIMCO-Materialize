$(document).ready(function(){
  $('.modal-trigger').leanModal();
//Funciones de la busqueda en dashboard --------------------------------------------------------------------------------------------
// Escribe en el evento keyup
$("#busqueda").keyup(function(){
    //Cuando el valor del input no esta vacio
    if( $(this).val() != "")
    {
        // Solo muestra las coincidencias y oculta lo demas
        $("#directorio tbody>tr").hide();
        $("#directorio td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        var id = $(this).val();
        var longitud = id.length;
        if(longitud == 4){
          $("#titulo_detalle").html("Detalle factura " + id);
        }
        else {
          $("#titulo_detalle").html("Escribe un folio de 4 digitos para mostrar el detalle de la factura ");
        }
    }
    else
    {
        // Cuando el input esta en blanco o se borra carga todo de nuevo
        $("#directorio tbody>tr").show();
    }
});
// Expression JQuery para que no sea Key-Sensitive
$.extend($.expr[":"],
{
    "contains-ci": function(elem, i, match, array)
    {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});
});
