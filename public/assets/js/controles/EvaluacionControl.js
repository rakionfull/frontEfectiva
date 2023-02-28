var alerta_EvaluacionControl = document.getElementById("alerta_EvaluacionControl");

function CargarDisenioOperatividad() {
    
    
    //cargando las calificaicon de disneio
    $.ajax({
        method: "GET",
        url: $('#base_url').val()+"/main/getDisenioCalificacion",
        dataType: "JSON"
    })
    .done(function(respuesta) {
       

        if (respuesta) 
        {
            let datos = respuesta;
          

            $("#disenio_eva").empty();
            $("#disenio_eva").append('<option value="" selected>Diseño</option>');

           

            datos.data.forEach(dato => {
                
              
                    $("#disenio_eva").append('<option value='+dato["id"]+'>'+dato["caracteristica"]+'</option>');

                
                
             
            });
        } 
        else
        {  }
    
    })
    .fail(function(error) {
        // alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });

 //cargando las calificaicon de operatividad
 $.ajax({
    method: "GET",
    url: $('#base_url').val()+"/main/getOperatividadCalificacion",
    dataType: "JSON"
})
.done(function(respuesta) {
   
    
    if (respuesta) 
    {
        let datos = respuesta;
      

        $("#operatividad_eva").empty();
        $("#operatividad_eva").append('<option value="" selected>Operatividad</option>');

       

        datos.data.forEach(dato => {
            
          
                $("#operatividad_eva").append('<option value='+dato["id"]+'>'+dato["caracteristica"]+'</option>');

            
            
         
        });
    } 
    else
    {  }

})
.fail(function(error) {
    // alert("Se produjo el siguiente error: ".err);
})
.always(function() {
});
    

   
}

function LoadTableEvaluacionControl() {
    if ($.fn.DataTable.isDataTable('#table_EvaluacionControl')){
        
        $('#table_EvaluacionControl').DataTable().rows().remove();
        $('#table_EvaluacionControl').DataTable().destroy();
    
    }

    $('#table_EvaluacionControl').DataTable({
        
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
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
        // scrollX: true,
        // fixedColumns:   {
        //     heightMatch: 'none'
        // },
        responsive: true,
        autoWidth: false,
        // processing: true,
        lengthMenu:[5,10,25,50],
        pageLength:10,
        clickToSelect:false,
        ajax: $('#base_url').val()+"/main/getEvaluacionControl",
        aoColumns: [
            { "data": "id" },
            { "data": "idDisenio" },
            { "data": "disenio" },
            { "data": "idOperatividad" },
            { "data": "operatividad" },
            { "data": "calificacion" },
            { "defaultContent": "<editEvaluacionControl class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editEvaluacionControl>"+
            "<deleteEvaluacionControl class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deleteEvaluacionControl>"

},
        ],
        columnDefs: [
            {
                "targets": [1,3 ],
                "visible": false,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_EvaluacionControl tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
    $("#table_EvaluacionControl").DataTable().ajax.reload(null, true); 
}

document.getElementById("btnAgregar_EvaluacionControl").addEventListener("click",function(){

    $("#modal_EvaluacionControl").modal("show");
    document.getElementById("title-EvaluacionControl").innerHTML = "Agregar Evaluacion de Control";
    document.getElementById("form_EvaluacionControl").reset();
    document.getElementById("Agregar_EvaluacionControl").style.display = "block";
    document.getElementById("Modificar_EvaluacionControl").style.display = "none";
  
});



// // boton de agregar evlauacion de control
document.getElementById("Agregar_EvaluacionControl").addEventListener("click", function(){
    $disenio_eva=document.getElementById("disenio_eva").value;
    $operatividad_eva=document.getElementById("operatividad_eva").value;
    $cali_eva=document.getElementById("cali_eva").value;
    
    if($disenio_eva !=""  && $operatividad_eva != "" && $cali_eva != "" ){
      
                
                const postData = { 
                    disenio : document.getElementById("disenio_eva").value,
                    operatividad : document.getElementById("operatividad_eva").value,
                    calificacion : document.getElementById("cali_eva").value,
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: $('#base_url').val()+"/main/addEvaluacionControl",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta.error==1) 
                        {
                        
                            
                            $("#modal_EvaluacionControl").modal("hide");    
                            document.getElementById("form_EvaluacionControl").reset();
                           
                            alerta_EvaluacionControl.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            respuesta.msg+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_EvaluacionControl").DataTable().ajax.reload(null, false); 
                           CargarDisenioOperatividad();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: respuesta.msg
                              })
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
        
           
       
    }else{
        
        Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: 'Debe completar todos los campos'
               })
  }

});

//editar  evlauacion de control
$('#table_EvaluacionControl tbody').on( 'click', 'editEvaluacionControl', function(){
    $("#modal_EvaluacionControl").modal("show");
    document.getElementById("title-EvaluacionControl").innerHTML = "Modificar Evaluacion de Control";
    document.getElementById("form_EvaluacionControl").reset();
    document.getElementById("Agregar_EvaluacionControl").style.display = "none";
    document.getElementById("Modificar_EvaluacionControl").style.display = "block";


    var table = $('#table_EvaluacionControl').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_EvaluacionControl").value=regDat[0]["id"];
        document.getElementById("disenio_eva").value=regDat[0]["idDisenio"];
        document.getElementById("operatividad_eva").value=regDat[0]["idOperatividad"];   
        document.getElementById("cali_eva").value=regDat[0]["calificacion"];   
     
    }
});
//guardando  evlauacion de control
document.getElementById("Modificar_EvaluacionControl").addEventListener("click",async function(){
    
    $disenio_eva=document.getElementById("disenio_eva").value;
    $operatividad_eva=document.getElementById("operatividad_eva").value;
    $cali_eva=document.getElementById("cali_eva").value;
    
    if($disenio_eva !=""  && $operatividad_eva != "" && $cali_eva != "" ){
      
                
                const postData = { 
                    disenio : document.getElementById("disenio_eva").value,
                    operatividad : document.getElementById("operatividad_eva").value,
                    calificacion : document.getElementById("cali_eva").value,
                    id : document.getElementById("id_EvaluacionControl").value,
                };
               
                try {
                   
                    $.ajax({
                        method: "POST",
                        url: $('#base_url').val()+"/main/updateEvaluacionControl",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                      
                        if (respuesta.msg) 
                        {
                            $("#modal_EvaluacionControl").modal("hide");    
                            document.getElementById("form_EvaluacionControl").reset();
                           
                            alerta_EvaluacionControl.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Modificado Correctamente'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_EvaluacionControl").DataTable().ajax.reload(null, false); 
                            CargarDisenioOperatividad();
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
            
        }else{
           
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Faltan Datos'
              })
               
          }
       
    
   
});

//eliminar  evlauacion de control
$('#table_EvaluacionControl tbody').on( 'click', 'deleteEvaluacionControl', function(){
     
    //recuperando los datos
    var table = $('#table_EvaluacionControl').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    const postData = { 
        id:regDat[0]["id"],
 
    };
    
    try {

        $.ajax({
            method: "POST",
            url: $('#base_url').val()+"/main/deleteEvaluacionControl",
            data: postData,
            dataType: "JSON"
        })

     
        .done(function(respuesta) {
       
            if (respuesta.msg) 
            {
                
                alerta_EvaluacionControl.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                respuesta.msg+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';

                $("#table_EvaluacionControl").DataTable().ajax.reload(null, true); 
                cargarOpciones();
            }else{
                alerta_EvaluacionControl.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
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