var alert_valActivo = document.getElementById("alert_valActivo");

function cargarDatosValActivo(){
   //Carga todas los aspeectos
    try {
        
            $.ajax({
                method: "POST",
                url: $('#base_url').val()+"/activo/getAspectoByActivo",
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    let datos = respuesta["data"];
                    //console.log(datos);
                    $("#id_aspecto1").empty();
                    $("#id_aspecto1").append('<option value=>Aspecto</option>');
                    $("#id_aspecto2").empty();
                    $("#id_aspecto2").append('<option value=>Aspecto</option>');
                    $("#id_aspecto3").empty();
                    $("#id_aspecto3").append('<option value=>Aspecto</option>');
                    datos.forEach(dato => {
                        $("#id_aspecto1").append('<option value='+dato["id"]+'>'+dato["aspecto"]+'</option>');
                        $("#id_aspecto2").append('<option value='+dato["id"]+'>'+dato["aspecto"]+'</option>');
                        $("#id_aspecto3").append('<option value='+dato["id"]+'>'+dato["aspecto"]+'</option>');
                    });
                } 
                else
                { //swal("Error", "Error al recoger los datos", "error"); }
                }
            })
            .fail(function(error) {
                // alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            // alert("Se produjo el siguiente error: ".err);
        }
            //Carga los valores
        try {

            $.ajax({
                method: "POST",
                url: $('#base_url').val()+"/activo/getValorActivoByActivo",
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    let datos = respuesta["data"];
                    //console.log(datos);
                    $("#id_valor_val").empty();
                    $("#id_valor_val").append('<option value=>Valor</option>');
                
                    datos.forEach(dato => {
                        $("#id_valor_val").append('<option value='+dato["id"]+'>'+dato["valor"]+'</option>');
                        
                    });
                } 
                else
                { //swal("Error", "Error al recoger los datos", "error"); }
                }
            })
            .fail(function(error) {
                // alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            // alert("Se produjo el siguiente error: ".err);
        }
}

function LoadTableValActivo() {
    if ($.fn.DataTable.isDataTable('#table_valActivo')){
        
        $('#table_valActivo').DataTable().rows().remove();
        $('#table_valActivo').DataTable().destroy();
    
    }

    $('#table_valActivo').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay informaci??n",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        scrollX: true,
        fixedColumns:   {
            heightMatch: 'none'
        },
        responsive: false,
        autoWidth: false,
        // processing: true,
        lengthMenu:[5,10,25,50],
        pageLength:5,
        clickToSelect:false,
        ajax: $('#base_url').val()+"/activo/getValActivo",
        aoColumns: [
            { "data": "id_valActivo" },
            { "data": "idaspecto1" },
            { "data": "aspecto1" },
            { "data": "valoracion1" },
            { "data": "idaspecto2" },
            { "data": "aspecto2" },
            { "data": "valoracion2" },
            { "data": "idaspecto3" },
            { "data": "aspecto3" },
            { "data": "valoracion3" },
            { "data": "valor" },
            { "data": "idvalor" },
           
            { "defaultContent": "<editvalActivo class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editvalActivo>"+
            "<deletevalActivo class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deletevalActivo>"

},
        ],
        columnDefs: [
            {
                "targets": [ 1,4,7,11 ],
                "visible": false,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_valActivo tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}

//validamos
async function validacionValActivo(){

    let result; /* Variable Resultado de Funcion */

    // Validar existe
        try {

            const postData = {           
                id_aspecto1:document.getElementById("id_aspecto1").value,
                id_aspecto2:document.getElementById("id_aspecto2").value,
                id_aspecto3:document.getElementById("id_aspecto3").value,
                nom_val1:document.getElementById("nom_val1").value,
                nom_val2:document.getElementById("nom_val2").value,
                nom_val3:document.getElementById("nom_val3").value,
                id_valor_val:document.getElementById("id_valor_val").value,
            };

            await $.ajax({
                method: "POST",
                url: $('#base_url').val()+"/activo/validarValActivo",
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
               
                result = respuesta;
            })
            .fail(function(error) {
                // alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            // alert("Se produjo el siguiente error: ".err);
        }
    // /.Validar existe

    return result; /* Retorno de Resultado */

};

document.getElementById("btnAgregar_valActivo").addEventListener("click",function(){
                                
    $("#modal_valActivo").modal("show");
    document.getElementById("title-valActivo").innerHTML = "Agregar Valoracion de Activo";
    document.getElementById("form_valActivo").reset();
    document.getElementById("Agregar_valActivo").style.display = "block";
    document.getElementById("Modificar_valActivo").style.display = "none";
   
});


// // boton de agregar Valoracion de activo
document.getElementById("Agregar_valActivo").addEventListener("click",async function(){
    $id_aspecto1=document.getElementById("id_aspecto1").value;
    $id_aspecto2=document.getElementById("id_aspecto2").value;
    $id_aspecto3=document.getElementById("id_aspecto3").value;
    $nom_val1=document.getElementById("nom_val1").value;
    $nom_val2=document.getElementById("nom_val2").value;
    $nom_val3=document.getElementById("nom_val3").value;
    $id_valor_val=document.getElementById("id_valor_val").value;
    
    if($id_aspecto1 !=""  && $id_aspecto2 != "" && $id_aspecto3 !=""  && $nom_val1 != "" && $nom_val2 !=""  && $nom_val3 != "" && $id_valor_val !="" ){
        if (!(await validacionValActivo())){
                const postData = { 
                    id_aspecto1:document.getElementById("id_aspecto1").value,
                    id_aspecto2:document.getElementById("id_aspecto2").value,
                    id_aspecto3:document.getElementById("id_aspecto3").value,
                    nom_val1:document.getElementById("nom_val1").value,
                    nom_val2:document.getElementById("nom_val2").value,
                    nom_val3:document.getElementById("nom_val3").value,
                    id_valor_val:document.getElementById("id_valor_val").value,
                    
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: $('#base_url').val()+"/activo/addValActivo",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_valActivo").reset();
                            $('#modal_valActivo').modal('hide');
                            alert_valActivo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Valoracion de Activo Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_valActivo").DataTable().ajax.reload(null, false); 
                           
                        } 
                        
                    })
                    .fail(function(error) {
                        // alert("Error en el ajax");
                    })
                    .always(function() {
                    });
                }
                catch(err) {
                 
                }
            }else{
                Swal.fire({
                         icon: 'error',
                         title: 'Error',
                         text: 'La Valoracion de activo ya se encuentra registrado'
                       })
          }
           
       
    }else{
        console.log("aqui11");
        Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: 'Faltan Datos'
               })
  }

});

//editar valoracion activo
$('#table_valActivo tbody').on( 'click', 'editvalActivo', function(){
    $("#modal_valActivo").modal("show");
    document.getElementById("title-valActivo").innerHTML = "Modificar Valoracion de Activo";
    document.getElementById("form_valActivo").reset();
    document.getElementById("Agregar_valActivo").style.display = "none";
    document.getElementById("Modificar_valActivo").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_valActivo').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
       
        document.getElementById("id_aspecto1").value=regDat[0]["idaspecto1"];
        document.getElementById("id_aspecto2").value=regDat[0]["idaspecto2"];
        document.getElementById("id_aspecto3").value=regDat[0]["idaspecto3"];
        document.getElementById("nom_val1").value=regDat[0]["valoracion1"];
        document.getElementById("nom_val2").value=regDat[0]["valoracion2"];
        document.getElementById("nom_val3").value=regDat[0]["valoracion3"];
        document.getElementById("id_valor_val").value=regDat[0]["idvalor"];
        document.getElementById("id_valActivo").value=regDat[0]["id_valActivo"];
       
    }
});

//guardando la nueva info
document.getElementById("Modificar_valActivo").addEventListener("click", function(){
    
    $id_aspecto1=document.getElementById("id_aspecto1").value;
    $id_aspecto2=document.getElementById("id_aspecto2").value;
    $id_aspecto3=document.getElementById("id_aspecto3").value;
    $nom_val1=document.getElementById("nom_val1").value;
    $nom_val2=document.getElementById("nom_val2").value;
    $nom_val3=document.getElementById("nom_val3").value;
    $id_valor_val=document.getElementById("id_valor_val").value;
    
    if($id_aspecto1 !=""  && $id_aspecto2 != "" && $id_aspecto3 !=""  && $nom_val1 != "" && $nom_val2 !=""  && $nom_val3 != "" && $id_valor_val !="" ){
          
                const postData = { 
                    id_aspecto1:document.getElementById("id_aspecto1").value,
                    id_aspecto2:document.getElementById("id_aspecto2").value,
                    id_aspecto3:document.getElementById("id_aspecto3").value,
                    nom_val1:document.getElementById("nom_val1").value,
                    nom_val2:document.getElementById("nom_val2").value,
                    nom_val3:document.getElementById("nom_val3").value,
                    id_valor_val:document.getElementById("id_valor_val").value,
                    id:document.getElementById("id_valActivo").value
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: $('#base_url').val()+"/activo/updateValActivo",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_valActivo").reset();
                            $('#modal_valActivo').modal('hide');
                            alert_valActivo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Modificado Correctamente'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_valActivo").DataTable().ajax.reload(null, false); 
                           
                        } 
                        
                    })
                    .fail(function(error) {
                        alert("Error en el ajax");
                    })
                    .always(function() {
                    });
                }
                catch(err) {
                    alert("Error en el try");
                }
            
           
       
    }else{
        console.log("aqui11");
        Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: 'Faltan Datos'
               })
  }
   
});

//eliminar valoracion de activo
$('#table_valActivo tbody').on( 'click', 'deletevalActivo', function(){
     
    //recuperando los datos
    
    var table = $('#table_valActivo').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    
    const postData = { 
        id:regDat[0]["id_valActivo"],
 
    };
    
    try {

        $.ajax({
            method: "POST",
            url: $('#base_url').val()+"/activo/deleteValActivo",
            data: postData,
            dataType: "JSON"
        })

     
        .done(function(respuesta) {
        //  console.log(respuesta);
            if (respuesta.msg) 
            {
                
                alert_valActivo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                respuesta.msg+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';

                $("#table_valActivo").DataTable().ajax.reload(null, true); 
               
            }else{
                alert_valActivo.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                respuesta.error+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
            } 
            
        })
        .fail(function(error) {
            // alert("Error en el ajax");
        })
        .always(function() {
        });
    }
    catch(err) {
        // alert("Error en el try");
    }
});
