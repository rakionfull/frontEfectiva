var alerta_planAccion = document.getElementById("alert_planAccion");
function LoadTabletable_PlanAccion() {   


    //cargando las empresas
    $.ajax({
        method: "POST",
        url:$('#base_url').val()+"/activo/getEmpresasByActivo",
        dataType: "JSON"
    })
    .done(function(respuesta) {
      
        if (respuesta) 
        {
            let datos = respuesta;
          
    
            $("#select_empresaPlan").empty();
            $("#select_empresaPlan").append('<option value="" selected>Seleccione</option>');
    
           
    
            datos.data.forEach(dato => {
                
              
                    $("#select_empresaPlan").append('<option value='+dato["id"]+'>'+dato["empresa"]+'</option>');
    
                
                
             
            });
        } 
        else
        {  }
    
    })
    .fail(function(error) {
        alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });
    
    //cargando las areas
    $.ajax({
        method: "POST",
        url: $('#base_url').val()+"/activo/getAreasByActivo",
        dataType: "JSON"
    })
    .done(function(respuesta) {
       
        if (respuesta) 
        {
            let datos = respuesta;
          
    
            $("#select_areaPlan").empty();
            $("#select_areaPlan").append('<option value="" selected>Seleccione</option>');
    
        
    
            datos.data.forEach(dato => {
                
            
                    $("#select_areaPlan").append('<option value='+dato["id"]+'>'+dato["area"]+'</option>');
    
                
                
            
            });
        } 
        else
        {  }
    
    })
    .fail(function(error) {
        alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });
    
    //cargando las Unidades
    $.ajax({
        method: "POST",
        url: $('#base_url').val()+"/activo/getUnidadByActivo",
        dataType: "JSON"
    })
    .done(function(respuesta) {
       
        if (respuesta) 
        {
            let datos = respuesta;
          
    
            $("#select_unidadesPlan").empty();
            $("#select_unidadesPlan").append('<option value="" selected>Seleccione</option>');
    
        
    
            datos.data.forEach(dato => {
                
            
                    $("#select_unidadesPlan").append('<option value='+dato["id"]+'>'+dato["unidad"]+'</option>');
    
                
                
            
            });
        } 
        else
        {  }
    
    })
    .fail(function(error) {
        alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });
    

    //cargando Posición
    $.ajax({
        method: "POST",
        url: $('#base_url').val()+"/activo/getPosicionByActivo",
        dataType: "JSON"
    })
    .done(function(respuesta) {
       
        if (respuesta) 
        {
            let datos = respuesta;
          
    
            $("#select_posicionPlan").empty();
            $("#select_posicionPlan").append('<option value="" selected>Seleccione</option>');
    
        
    
            datos.data.forEach(dato => {
                
            
                    $("#select_posicionPlan").append('<option value='+dato["id"]+'>'+dato["posicion_puesto"]+'</option>');
    
                
                
            
            });
        } 
        else
        {  }
    
    })
    .fail(function(error) {
        alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });
    
    

    


    if ($.fn.DataTable.isDataTable('#table_planAccion')){
        
        $('#table_planAccion').DataTable().rows().remove();
        $('#table_planAccion').DataTable().destroy();
    
    }

    $('#table_planAccion').DataTable({
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
        
        //ajax: $('#base_url').val()+"/activo/getEstado",
        ajax: BASE_URL+"/activo/getPlanAccion",
        aoColumns: [            
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "plan_accion" },            
            { "data": "actividades" },
            { "data": "area" },            
            { "data": "estado" },
            { "data": "prioridad" },
            { "data": "fecha_inicio" },
            { "data": "fecha_fin",
                                   
            
            
            /*"mRender": function(data, type, value) {
                if (data == '1') return  'Activo';
                else return 'Inactivo'
                  

                }*/
            },            
            {
              "defaultContent": "<button class='btn btn-sm btn-info ver-detalle'>Ver detalle</button>"
            },
            { "defaultContent": "<editEstado class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editEstado>"+
            "<deleteEstado class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteEstado>"

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
            $( 'table_planAccion tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}


//   Boton Agregar Plan de Acción
document.getElementById("btnAgregar_planAccion").addEventListener("click",function(){
                                
    $("#modal_planAccion").modal("show");    
    document.getElementById("title-planAccion").innerHTML = "Agregar";
    document.getElementById("form_planAccion").reset();
    document.getElementById("Agregar_planAccion").style.display = "block";
    document.getElementById("Modificar_planAccion").style.display = "none";
});


document.getElementById("Agregar_planAccion").addEventListener("click",function(){
    $nom_est=document.getElementById("nom_est").value;    
    $des_est=document.getElementById("des_est").value;
    
    if($nom_est !=""  && $des_est != ""){
       
                const postData = { 
                    estado:$nom_est,
                    descripcion:$des_est,                    
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        //url: BASE_URL+"/activo/addEstado",
                        url: BASE_URL+"/activo/addEstado",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                        // console.log(respuesta);
                         if (respuesta.error==1) 
                         {
                             document.getElementById("form_estado").reset();
                             $('#modal_estado').modal('hide');
                             alerta_estado.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                             +  respuesta.msg +
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                 '<span aria-hidden="true">&times;</span>'+
                                 '</button>'+
                             '</div>';
                             $("#table_estado").DataTable().ajax.reload(null, false); 
                            
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

/*  Tabla ver Detalle
 $('#table_planAccion').on('click', '.ver-detalle', function() {
    var data = $(this).closest('tr').data();
    // aquí muestras la información de la fila
});
*/


