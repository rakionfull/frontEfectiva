var alerta_Opcion = document.getElementById("alerta_Opcion");
var valor = "";
var tipo = "";
var clasi = 0;
var id = 0;
function validaciones() {
   
    
    
    if(valor == "general" ){
        
        document.getElementById("nom_opcion").placeholder="Caracteristica";
        document.getElementById("apartcondi_opcion").style.display  = "none";
        document.getElementById("apartvalor_opcion").style.display  = "none";
        document.getElementById("apartest_opcion").style.display  = "block";
        document.getElementById("apartcali_opcion").style.display  = "none";
        document.getElementById("apartcali2_opcion").style.display  = "none";
        document.getElementById("apartpeso_opcion").style.display  = "none";
        document.getElementById("apartCheckTabla_opcion").style.display  = "none";
        document.getElementById("aparNomTabla_opcion").style.display  = "none";
    }
    if(tipo == "menu" && id!=0 && valor != "general"){
        document.getElementById("nom_opcion").placeholder="Caracteristica";
        document.getElementById("apartcondi_opcion").style.display  = "none";
        document.getElementById("apartvalor_opcion").style.display  = "none";
        document.getElementById("apartest_opcion").style.display  = "block";
        document.getElementById("apartcali_opcion").style.display  = "none";
        document.getElementById("apartpeso_opcion").style.display  = "none";
        document.getElementById("apartcali2_opcion").style.display  = "block";
        document.getElementById("apartCheckTabla_opcion").style.display  = "none";
        document.getElementById("aparNomTabla_opcion").style.display  = "none";
    }
    if(tipo == "submenu" && id!=0 && valor != "general"){
        document.getElementById("nom_opcion").placeholder="Caracteristica";
       
       
        document.getElementById("apartcali_opcion").style.display  = "none";
      
        
        document.getElementById("apartCheckTabla_opcion").style.display  = "block";
        document.getElementById("aparNomTabla_opcion").style.display  = "none";
        if(clasi == 1){
            document.getElementById("apartcondi_opcion").style.display  = "block";
            document.getElementById("apartvalor_opcion").style.display  = "block";
            document.getElementById("apartpeso_opcion").style.display  = "none";
            document.getElementById("apartcali2_opcion").style.display  = "none";
            document.getElementById("apartest_opcion").style.display  = "none";
        }else{
            document.getElementById("apartcondi_opcion").style.display  = "none";
            document.getElementById("apartvalor_opcion").style.display  = "none";
            document.getElementById("apartpeso_opcion").style.display  = "block";
            document.getElementById("apartcali2_opcion").style.display  = "none";
            document.getElementById("apartest_opcion").style.display  = "block";
        }
    }
    
}
function LoadTableOpcion($valor,$id,$tipo,$clasi) {
   
   
    if($valor == "general"){
     valor = $valor;
       tipo = $tipo;
       clasi = $clasi
        document.getElementById("card-title-opcion").innerHTML = "";
        document.getElementById("card-title-opcion").innerHTML = "Caracteristica de Control";
        if ($.fn.DataTable.isDataTable('#table_Opcion')){
        
            $('#table_Opcion').DataTable().rows().remove();
            $('#table_Opcion').DataTable().destroy();
        
        }
        $('#table_Opcion').DataTable({
        
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
            ajax: $('#base_url').val()+"/main/getCaractControl/0/0/0",
            aoColumns: [
                { "data": "id" },
                { "data": "caracteristica" },
                { "data": "clasificacion" },
                { "data": "valor" },
                { "data": "condicion" },
                { "data": "peso" },
                { "data": "descripcion" },
                { "data": "tipo" },
                {  "data": "estado",
                            
                    "mRender": function(data, type, value) {
                        if (data == '1') return  'Activo';
                        else return 'Inactivo'
                        
    
                    }
                },
                { "defaultContent": "<editCaractControl class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editCaractControl>"+
                "<deleteCaractControl class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deleteCaractControl>"
    
            },
            { "data": "check_tabla" },
            { "data": "nom_tabla" },
            ],
            columnDefs: [
                {
                    "targets": [2,3,4,5,7,10,11],
                    "visible": false,
                    "searchable": false
                },
                
            ],
            'drawCallback': function () {
                $( 'table_Opcion tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
            }
            
        })
    }else{
        valor = $valor;
        tipo = $tipo;
        clasi = $clasi;
        id=$id;
        document.getElementById("card-title-opcion").innerHTML = "";
        document.getElementById("card-title-opcion").innerHTML = valor;
        
        if(tipo == "menu" && id == 0){
         
            if ($.fn.DataTable.isDataTable('#table_Opcion')){
        
                $('#table_Opcion').DataTable().rows().remove();
                $('#table_Opcion').DataTable().destroy();
               
            }
            $('#table_Opcion').DataTable({
        
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
                ajax: $('#base_url').val()+"/main/getCaractControl/"+$id+"/"+tipo+"/"+clasi,
                aoColumns: [
                    { "data": "id" },
                    { "data": "caracteristica" },
                    { "data": "clasificacion" },
                    { "data": "valor" },
                    { "data": "condicion" },
                    { "data": "peso" },
                    { "data": "descripcion" },
                    { "data": "tipo" },
                    {  "data": "estado",
                                
                        "mRender": function(data, type, value) {
                            if (data == '1') return  'Activo';
                            else return 'Inactivo'
                            
        
                        }
                    },
                    { "defaultContent": "<editCaractControl class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editCaractControl>"+
                    "<deleteCaractControl class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deleteCaractControl>"
        
                },
                { "data": "check_tabla" },
                { "data": "nom_tabla" },
                ],
                columnDefs: [
                    {
                        "targets": [0,10,11],
                        "visible": false,
                        "searchable": false
                    },
                    
                ],
                'drawCallback': function () {
                    $( 'table_Opcion tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
                }
                
            })
        }
        if(tipo == "menu" && id != 0 ){
            if ($.fn.DataTable.isDataTable('#table_Opcion')){
        
                $('#table_Opcion').DataTable().rows().remove();
                $('#table_Opcion').DataTable().destroy();
            
            }
            $('#table_Opcion').DataTable({
        
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
                pageLength:10,
                clickToSelect:false,
                ajax: $('#base_url').val()+"/main/getCaractControl/"+$id+"/"+tipo+"/"+clasi,
                aoColumns: [
                    { "data": "id" },
                    { "data": "caracteristica" }, 
                    { "data": "clasificacion" }, 
                    { "data": "valor" },
                    { "data": "condicion" },
                    { "data": "peso" },
                    { "data": "descripcion" },
                    { "data": "tipo" },
                    {  "data": "estado",
                                
                        "mRender": function(data, type, value) {
                            if (data == '1') return  'Activo';
                            else return 'Inactivo'
                            
        
                        }
                    },
                    { "defaultContent": "<editCaractControl class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editCaractControl>"+
                    "<deleteCaractControl class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deleteCaractControl>"
        
                },
                { "data": "check_tabla" },
                { "data": "nom_tabla" },
                ],
                columnDefs: [
                    {
                        "targets": [2,3,4,5,7,10,11],
                        "visible": false,
                        "searchable": false
                    },
                    
                ],
                'drawCallback': function () {
                    $( 'table_caract_control tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
                }
                
            })
        }else{
            if(tipo == "submenu" && clasi == 0){
             
                if ($.fn.DataTable.isDataTable('#table_Opcion')){
        
                    $('#table_Opcion').DataTable().rows().remove();
                    $('#table_Opcion').DataTable().destroy();
                
                }
                $('#table_Opcion').DataTable({
            
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
                    pageLength:10,
                    clickToSelect:false,
                    ajax: $('#base_url').val()+"/main/getCaractControl/"+$id+"/"+tipo+"/"+clasi,
                    aoColumns: [
                        { "data": "id" },
                        { "data": "caracteristica" }, 
                        { "data": "clasificacion" }, 
                        { "data": "valor" },
                        { "data": "condicion" },
                        { "data": "peso" },
                        { "data": "descripcion" },
                        { "data": "tipo" },
                        {  "data": "estado",
                                    
                            "mRender": function(data, type, value) {
                                if (data == '1') return  'Activo';
                                else return 'Inactivo'
                                
            
                            }
                        },
                        { "defaultContent": "<editCaractControl class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editCaractControl>"+
                        "<deleteCaractControl class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deleteCaractControl>"
            
                    },
                    { "data": "check_tabla" },
                    { "data": "nom_tabla" },
                    ],
                    columnDefs: [
                        {
                            "targets": [2,3,4,7,10,11],
                            "visible": false,
                            "searchable": false
                        },
                        
                    ],
                    'drawCallback': function () {
                        $( 'table_caract_control tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
                    }
                    
                })
            }
            if(tipo == "submenu" && clasi == 1){
                
                if ($.fn.DataTable.isDataTable('#table_Opcion')){
        
                    $('#table_Opcion').DataTable().rows().remove();
                    $('#table_Opcion').DataTable().destroy();
                
                }
                $('#table_Opcion').DataTable({
            
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
                    ajax: $('#base_url').val()+"/main/getCaractControl/"+$id+"/"+tipo+"/"+clasi,
                    aoColumns: [
                        { "data": "id" },
                        { "data": "caracteristica" },  
                        { "data": "clasificacion" }, 
                        
                        { "data": "valor" },
                        { "data": "condicion" },
                        { "data": "peso" },
                        { "data": "descripcion" },
                        { "data": "tipo" },
                        {  "data": "estado",
                                    
                            "mRender": function(data, type, value) {
                                if (data == '1') return  'Activo';
                                else return 'Inactivo'
                                
            
                            }
                        },
                        { "defaultContent": "<editCaractControl class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='fas fa-edit font-size-18'></i></editCaractControl>"+
                        "<deleteCaractControl class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='far fa-trash-alt font-size-18'></i></deleteCaractControl>"
            
                    },
                    { "data": "check_tabla" },
                    { "data": "nom_tabla" },
                    ],
                    columnDefs: [
                        {
                            "targets": [2,5,6,7,8,10,11],
                            "visible": false,
                            "searchable": false
                        },
                        
                    ],
                    'drawCallback': function () {
                        $( 'table_Opcion tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
                    }
                    
                })
            }
          
        }
       
    }
    
   
    // $("#table_Opcion").DataTable().ajax.reload(null, true); 
}
document.getElementById("btnAgregar_Opcion").addEventListener("click",function(){

    $("#modal_Opcion").modal("show");
    document.getElementById("title-Opcion").innerHTML = "Agregar " + valor;
    document.getElementById("form_Opcion").reset();
    document.getElementById("Agregar_Opcion").style.display = "block";
    document.getElementById("Modificar_Opcion").style.display = "none";
    validaciones();
});

function AgregarOpcion(postData) {
    // console.log(postData);
    try {

        $.ajax({
            method: "POST",
            url: $('#base_url').val()+"/main/addCaractControl",
            data: postData,
            dataType: "JSON"
        })
        .done(function(respuesta) {
         
            if (respuesta.error==1) 
            {
            
                
                $("#modal_Opcion").modal("hide");    
                document.getElementById("form_Opcion").reset();
               
                alerta_Opcion.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                respuesta.msg+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
                $("#table_Opcion").DataTable().ajax.reload(null, false); 
                cargarOpciones();
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
}
function ModificarOpcion(postData) {

    try {

        $.ajax({
            method: "POST",
            url: $('#base_url').val()+"/main/updateCaractControl",
            data: postData,
            dataType: "JSON"
        })
        .done(function(respuesta) {
         
            if (respuesta) 
            {
            
                
                $("#modal_Opcion").modal("hide");    
                document.getElementById("form_Opcion").reset();
               
                alerta_Opcion.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                'Modificado'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
                $("#table_Opcion").DataTable().ajax.reload(null, false); 
                cargarOpciones();
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
}

// // boton de agregar Caracteristica
document.getElementById("Agregar_Opcion").addEventListener("click", function(){
    $nom_opcion=document.getElementById("nom_opcion").value;
    $desc_opcion=document.getElementById("desc_opcion").value;
    $est_opcion=document.getElementById("est_opcion").value;
    $condi_opcion=document.getElementById("condi_opcion").value;
    $valor_opcion=document.getElementById("valor_opcion").value;
    $peso_opcion=document.getElementById("peso_opcion").value;
    if(tipo == "menu" && id==0 && valor=="general"){
        if($nom_opcion !=""  && $desc_opcion != "" && $est_opcion != "" ){
      
                
            const postData = { 
                caracteristica : document.getElementById("nom_opcion").value,
                descripcion : document.getElementById("desc_opcion").value,
                estado : document.getElementById("est_opcion").value,
                condicion : document.getElementById("condi_opcion").value,
                valor : document.getElementById("valor_opcion").value,
                peso : document.getElementById("peso_opcion").value,
                check_tabla : 0,
                nom_tabla: document.getElementById("nom_tabla").value,
                tipo : 'menu',
                id : id,
                calificacion : 0,
            };
            AgregarOpcion(postData)  
        }else{
            
            Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe completar todos los campos'
                })
        }
    }
    if(tipo == "menu" && id!=0 && valor!="general"){
        if($nom_opcion !=""  && $desc_opcion != "" && $est_opcion != "" ){
            
            $calificaicon = 0;
            if(document.getElementById("cali2_opcion").checked){
                $calificaicon = 1;
            }
            
                
            const postData = { 
                caracteristica : document.getElementById("nom_opcion").value,
                descripcion : document.getElementById("desc_opcion").value,
                estado : document.getElementById("est_opcion").value,
                condicion : document.getElementById("condi_opcion").value,
                valor : document.getElementById("valor_opcion").value,
                peso : document.getElementById("peso_opcion").value,
                check_tabla : 0,
                nom_tabla: document.getElementById("nom_tabla").value,
                tipo : 'submenu',
                id : id,
                calificacion : $calificaicon,
            };
            AgregarOpcion(postData)  
        }else{
            
            Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe completar todos los campos'
                })
        }
    }
    if(tipo == "submenu" && id!=0 && valor!="general"){
        if(clasi==0){
                 
            if($nom_opcion !=""  && $desc_opcion != "" && $est_opcion != "" && $peso_opcion != "" ){
               
                $check_tabla = 0;
                if(document.getElementById("check_tabla_opcion").checked){
                    $check_tabla = 1;
                }
                
                const postData = { 
                    caracteristica : document.getElementById("nom_opcion").value,
                    descripcion : document.getElementById("desc_opcion").value,
                    estado : document.getElementById("est_opcion").value,
                    condicion : document.getElementById("condi_opcion").value,
                    valor : document.getElementById("valor_opcion").value,
                    peso : document.getElementById("peso_opcion").value,
                    check_tabla : $check_tabla,
                    nom_tabla: document.getElementById("nom_tabla").value,
                    tipo : 'opcion',
                    id : id,
                    calificacion : 0,
                };
                AgregarOpcion(postData)  
            }else{
                
                Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Debe completar todos los campos'
                    })
            }
        }else{
            console.log("hola2");
            if($nom_opcion !=""  && $desc_opcion != "" && $condi_opcion != "" && $valor_opcion != "" ){
                console.log("hola2");
                $check_tabla = 0;
                if(document.getElementById("check_tabla_opcion").checked){
                    $check_tabla = 1;
                }
                const postData = { 
                    caracteristica : document.getElementById("nom_opcion").value,
                    descripcion : document.getElementById("desc_opcion").value,
                    estado : 1,
                    condicion : document.getElementById("condi_opcion").value,
                    valor : document.getElementById("valor_opcion").value,
                    peso : document.getElementById("peso_opcion").value,
                    check_tabla : $check_tabla,
                    nom_tabla: document.getElementById("nom_tabla").value,
                    tipo : 'opcion',
                    id : id,
                    calificacion : 1,
                };
                AgregarOpcion(postData)  
            }else{
                
                Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Debe completar todos los campos'
                    })
            }
        }
    }
      
        
    
    

});

document.getElementById("cali_opcion").addEventListener("change", function(){
    

    if(document.getElementById("cali_opcion").checked){
        document.getElementById("nom_opcion").placeholder="Calificacion";
        document.getElementById("apartcondi_opcion").style.display  = "block";
        document.getElementById("apartpeso_opcion").style.display  = "none";
        document.getElementById("apartvalor_opcion").style.display  = "block";
        document.getElementById("apartest_opcion").style.display  = "none";
        document.getElementById("apartcali_opcion").style.display  = "block";
    }else{
        document.getElementById("nom_opcion").placeholder="Caracteristica";
        document.getElementById("apartcondi_opcion").style.display  = "none";
        document.getElementById("apartvalor_opcion").style.display  = "none";
        document.getElementById("apartest_opcion").style.display  = "block";
        document.getElementById("apartcali_opcion").style.display  = "block";
        document.getElementById("apartpeso_opcion").style.display  = "block";
    }

})
document.getElementById("check_tabla_opcion").addEventListener("change", function(){
    

    if(document.getElementById("check_tabla_opcion").checked){
       
        document.getElementById("aparNomTabla_opcion").style.display  = "block";
    }else{
        document.getElementById("aparNomTabla_opcion").style.display  = "none";
       
    }

})
//editar 
$('#table_Opcion tbody').on( 'click', 'editCaractControl', function(){
    $("#modal_Opcion").modal("show");
    document.getElementById("title-Opcion").innerHTML = "Modificar " + valor;
    document.getElementById("form_Opcion").reset();
    document.getElementById("Agregar_Opcion").style.display = "none";
    document.getElementById("Modificar_Opcion").style.display = "block";
    validaciones();
    var table = $('#table_Opcion').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_Opcion").value=regDat[0]["id"];
        document.getElementById("nom_opcion").value=regDat[0]["caracteristica"];
        document.getElementById("desc_opcion").value=regDat[0]["descripcion"];   
        document.getElementById("est_opcion").value=regDat[0]["estado"];   

        document.getElementById("condi_opcion").value = regDat[0]["condicion"];   
        document.getElementById("valor_opcion").value = regDat[0]["valor"];   
        document.getElementById("peso_opcion").value = regDat[0]["peso"];  
        if(regDat[0]["clasificacion"] == 1){
            $("#cali2_opcion").prop("checked", true);
           
        }
        if(regDat[0]["check_tabla"] == 1){
            $("#check_tabla_opcion").prop("checked", true);
            document.getElementById("aparNomTabla_opcion").style.display  = "block";
        }
        document.getElementById("nom_tabla").value = regDat[0]["nom_tabla"];  
        if(regDat[0]["condicion"] != ""){
            $("#cali_opcion").prop("checked", true);
            document.getElementById("nom_opcion").placeholder="Calificacion";
            document.getElementById("apartcondi_opcion").style.display  = "block";
            document.getElementById("apartpeso_opcion").style.display  = "none";
            document.getElementById("apartvalor_opcion").style.display  = "block";
            document.getElementById("apartest_opcion").style.display  = "none";
            document.getElementById("apartcali_opcion").style.display  = "block";
        }
    }
});
//guardando la nueva info
document.getElementById("Modificar_Opcion").addEventListener("click",function(){
    $nom_opcion=document.getElementById("nom_opcion").value;
    $desc_opcion=document.getElementById("desc_opcion").value;
    $est_opcion=document.getElementById("est_opcion").value;
    $condi_opcion=document.getElementById("condi_opcion").value;
    $valor_opcion=document.getElementById("valor_opcion").value;
    $peso_opcion=document.getElementById("peso_opcion").value;
    if(tipo == "menu" && id==0 && valor=="general"){
        if($nom_opcion !=""  && $desc_opcion != "" && $est_opcion != "" ){
      
                
            const postData = { 
                id_op : document.getElementById("id_Opcion").value,
                caracteristica : document.getElementById("nom_opcion").value,
                descripcion : document.getElementById("desc_opcion").value,
                estado : document.getElementById("est_opcion").value,
                condicion : document.getElementById("condi_opcion").value,
                valor : document.getElementById("valor_opcion").value,
                peso : document.getElementById("peso_opcion").value,
                check_tabla : 0,
                nom_tabla: document.getElementById("nom_tabla").value,
                tipo : 'menu',
                id : id,
                calificacion : 0,
            };
            ModificarOpcion(postData)  
        }else{
            
            Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe completar todos los campos'
                })
        }
    }
    if(tipo == "menu" && id!=0 && valor!="general"){
        if($nom_opcion !=""  && $desc_opcion != "" && $est_opcion != "" ){
            
            $calificaicon = 0;
            if(document.getElementById("cali2_opcion").checked){
                $calificaicon = 1;
            }
            
                
            const postData = { 
                id_op : document.getElementById("id_Opcion").value,
                caracteristica : document.getElementById("nom_opcion").value,
                descripcion : document.getElementById("desc_opcion").value,
                estado : document.getElementById("est_opcion").value,
                condicion : document.getElementById("condi_opcion").value,
                valor : document.getElementById("valor_opcion").value,
                peso : document.getElementById("peso_opcion").value,
                check_tabla : 0,
                nom_tabla: document.getElementById("nom_tabla").value,
                tipo : 'submenu',
                id : id,
                calificacion : $calificaicon,
            };
            ModificarOpcion(postData)  
        }else{
            
            Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe completar todos los campos'
                })
        }
    }
    if(tipo == "submenu" && id!=0 && valor!="general"){
        if(clasi==0){
                           
            if($nom_opcion !=""  && $desc_opcion != "" && $est_opcion != "" && $peso_opcion != "" ){
      
                $check_tabla = 0;
                if(document.getElementById("check_tabla_opcion").checked){
                    $check_tabla = 1;
                }
                const postData = { 
                    id_op : document.getElementById("id_Opcion").value,
                    caracteristica : document.getElementById("nom_opcion").value,
                    descripcion : document.getElementById("desc_opcion").value,
                    estado : document.getElementById("est_opcion").value,
                    condicion : document.getElementById("condi_opcion").value,
                    valor : document.getElementById("valor_opcion").value,
                    peso : document.getElementById("peso_opcion").value,
                    check_tabla : $check_tabla,
                    nom_tabla: document.getElementById("nom_tabla").value,
                    tipo : 'opcion',
                    id : id,
                    calificacion : 0,
                };
                ModificarOpcion(postData)  
            }else{
                
                Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Debe completar todos los campos'
                    })
            }
        }else{
          
            if($nom_opcion !=""  && $desc_opcion != "" && $condi_opcion != "" && $valor_opcion != "" ){
                $check_tabla = 0;
                if(document.getElementById("check_tabla_opcion").checked){
                    $check_tabla = 1;
                }
                
                const postData = { 
                    id_op : document.getElementById("id_Opcion").value,
                    caracteristica : document.getElementById("nom_opcion").value,
                    descripcion : document.getElementById("desc_opcion").value,
                    estado : 1,
                    condicion : document.getElementById("condi_opcion").value,
                    valor : document.getElementById("valor_opcion").value,
                    peso : document.getElementById("peso_opcion").value,
                    check_tabla : $check_tabla,
                    nom_tabla: document.getElementById("nom_tabla").value,
                    tipo : 'opcion',
                    id : id,
                    calificacion : 1,
                };
                ModificarOpcion(postData)  
            }else{
                
                Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Debe completar todos los campos'
                    })
            }
        }
    }
   
});

//eliminar cobertura
$('#table_Opcion tbody').on( 'click', 'deleteCaractControl', function(){
     
    //recuperando los datos
    var table = $('#table_Opcion').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    const postData = { 
        id_op:regDat[0]["id"],
 
    };
    
    try {

        $.ajax({
            method: "POST",
            url: $('#base_url').val()+"/main/deleteCaractControl",
            data: postData,
            dataType: "JSON"
        })

     
        .done(function(respuesta) {
       
            if (respuesta.msg) 
            {
                
                alerta_Opcion.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                respuesta.msg+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';

                $("#table_Opcion").DataTable().ajax.reload(null, true); 
                cargarOpciones();
            }else{
                alerta_Opcion.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
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

