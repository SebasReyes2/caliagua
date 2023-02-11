/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $.ajax({
            url:'combos.php?Accion=GetCantones',
            success:function(Datos){
            $("#canton,#parroquia,#barrio,#sistema").append("<option value=''>---Seleccionar---</option>");
                    for(x=0;x<Datos.length;x++)
                        {
                            $("#canton").append(new Option(Datos[x].nombrecanton,Datos[x].codcanton ));
                        }
                }
        });
        $('#canton').change(function(){
                    $('#parroquia,#barrio,#sistema').empty();
                    $("#barrio,#sistema").append("<option value=''>---Selecionar---</option>");
                    $.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                        $("#parroquia").append("<option value=''>---Selecionar---</option>");
                         for(x=0;x<Datos.length;x++)
                            {
                                $("#parroquia").append(new Option(Datos[x].nombreparroquia,Datos[x].codparroquia));
                            }
                    });
                });
        $('#parroquia').change(function(){
            $('#barrio,#sistema').empty();
            $.getJSON("combos.php",{Accion:'GetBarrios',codparroquia:$('#parroquia option:selected').val()},function(Datos){
                $("#barrio,#sistema").append("<option value=''>---Selecionar---</option>");
                for(x=0;x<Datos.length;x++)
                {
                    $("#barrio").append(new Option(Datos[x].nombrebarrio,Datos[x].codbarrio));
                }
            });
        });
        $('#barrio').change(function(){
           $('#sistema').empty();
           $.getJSON("combos.php",{Accion:'GetSistemas',codbarrio:$('#barrio option:selected').val()},function(Datos){
               $("#sistema").append("<option value=''>---Selecionar---</option>");
               for(x=0;x<Datos.length;x++)
                   {
                       $("#sistema").append(new Option(Datos[x].nombresistema,Datos[x].codsistema));
                   }
           });
       }); 
});


