var alerta_alerSeguimiento = document.getElementById("alert_alerSeguimiento");

function LoadTableAlerSeguimiento() {
   
    if ($.fn.DataTable.isDataTable('#table_alerSeguimiento')){
        
        $('#table_alerSeguimiento').DataTable().rows().remove();
        $('#table_alerSeguimiento').DataTable().destroy();
    
    }

    $('#table_alerSeguimiento').DataTable({
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
        // scrollY: "200px",
        // fixedColumns:   {
        //     heightMatch: 'none'
        // },
        responsive: true,
        autoWidth: false,
        // processing: true,
        lengthMenu:[5,10,25,50],
        pageLength:5,
        clickToSelect:false,
        //ajax: BASE_URL+"/PlanAccion/getEstado",
        //ajax: $('#base_url').val()+"/activo/getArea",
        ajax: $('#base_url').val()+"/activo/getAlerta_seguimiento",
        aoColumns: [            
            { "data": "id" },
            { "data": "id" },      
            { "data": "alerta" },
            { "data": "alerta" },                        
            { "data": "valor" },
            { "data": "descripcion"},                        
            { "defaultContent": "<editalerSeguimiento class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editalerSeguimiento>"+
            "<deletealerSeguimiento class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deletealerSeguimiento>"

},
        ],
        columnDefs: [
            {
                "targets": [ 1,2 ],
                "visible": false,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_alerSeguimiento tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}


//alerta seguimiento
document.getElementById("btnAgregar_alerSeguimiento").addEventListener("click",function(){
                                
    $("#modal_alerSeguimiento").modal("show");    
    document.getElementById("title-alerSeguimiento").innerHTML = "Agregar";
    document.getElementById("form_alerSeguimiento").reset();
    document.getElementById("Agregar_alerSeguimiento").style.display = "block";
    document.getElementById("Modificar_alerSeguimiento").style.display = "none";
});


document.getElementById("Agregar_alerSeguimiento").addEventListener("click",function(){
    $nom_alert=document.getElementById("nom_alert").value;
    $val_alert=document.getElementById("val_alert").value;
    $des_alert=document.getElementById("des_alert").value;
    
    if($nom_alert !=""  && $des_alert != "" && $val_alert != ""){
       
                const postData = { 
                    alerta:$nom_alert,
                    descripcion:$des_alert,
                    valor:$val_alert,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        //url: BASE_URL+"/activo/addAlerta_seguimiento",
                        url: BASE_URL+"/activo/addAlerta_seguimiento",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                        // console.log(respuesta);
                         if (respuesta.error==1) 
                         {
                             document.getElementById("form_alerSeguimiento").reset();
                             $('#modal_alerSeguimiento').modal('hide');
                             alerta_alerSeguimiento.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                             +  respuesta.msg +
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                 '<span aria-hidden="true">&times;</span>'+
                                 '</button>'+
                             '</div>';
                             $("#table_alerSeguimiento").DataTable().ajax.reload(null, false); 
                            
                         } else{
                             Swal.fire({
                                 icon: 'error',
                                 title: 'Error',
                                 text: respuesta.msg
                               })
                         }
                         
                     })
                     .fail(function(error) {
                        
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
                  text: 'Faltan Datos'
                })
   }
    
 
 
 });


$('#table_alerSeguimiento tbody').on( 'click', 'editalerSeguimiento', function(){
    $("#modal_alerSeguimiento").modal("show");
    document.getElementById("title-alerSeguimiento").innerHTML = "Modificar";
    document.getElementById("form_alerSeguimiento").reset();
    document.getElementById("Agregar_alerSeguimiento").style.display = "none";
    document.getElementById("Modificar_alerSeguimiento").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_alerSeguimiento').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_alert").value=regDat[0]["id"];
        document.getElementById("nom_alert").value=regDat[0]["alerta"];
        document.getElementById("val_alert").value=regDat[0]["valor"];
        document.getElementById("des_alert").value=regDat[0]["descripcion"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_alerSeguimiento").addEventListener("click", function(){
    
    $nom_alert=document.getElementById("nom_alert").value;
    $val_alert=document.getElementById("val_alert").value;
    $des_alert=document.getElementById("des_alert").value;
    
    
    if($nom_alert !="" && $val_alert != "" && $des_alert != ""){
       
                const postData = { 
                    id:document.getElementById("id_alert").value,
                    alerta:$nom_alert,
                    valor:$val_alert,
                    descripcion:$des_alert,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/activo/updateAlerta_seguimiento",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_alerSeguimiento").reset();
                            $('#modal_alerSeguimiento').modal('hide');
                            alerta_alerSeguimiento.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Se ha modificado exitosamente'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_alerSeguimiento").DataTable().ajax.reload(null, false); 
                           
                        } 
                        
                    })
                    .fail(function(error) {
                       
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
                 text: 'Faltan Datos'
               })
  }
   
});




$('#table_alerSeguimiento tbody').on( 'click', 'deletealerSeguimiento', function(){
     
    //recuperando los datos
    var table = $('#table_alerSeguimiento').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    const postData = { 
        id:regDat[0]["id"],
 
    };
    
    try {

        $.ajax({
            method: "POST",
            url: $('#base_url').val()+"/activo/deleteAlerta_seguimiento",
            data: postData,
            dataType: "JSON"
        })

     
        .done(function(respuesta) {
        //  console.log(respuesta);
            if (respuesta.msg) 
            {
                
                alerta_alerSeguimiento.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                respuesta.msg+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';

                $("#table_alerSeguimiento").DataTable().ajax.reload(null, true); 
               
            }else{
                alerta_alerSeguimiento.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
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


