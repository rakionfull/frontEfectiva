var BASE_URL = document.getElementById("base_url").value;
var alerta_evaluacion_riesgo = document.getElementById("alerta_evaluacion_riesgo");
loadTableEvaluacionRiesgos()
function loadTableEvaluacionRiesgos(){
    if ($.fn.DataTable.isDataTable('#table_evaluacion_riesgo')){
        $('#table_evaluacion_riesgo').DataTable().rows().remove();
        $('#table_evaluacion_riesgo').DataTable().destroy();
    }

    let table = $('#table_evaluacion_riesgo').DataTable({
        
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
        responsive: false,
        autoWidth: false,
        // processing: true,
        lengthMenu:[5,10,25,50],
        pageLength:5,
        clickToSelect:false,
        ajax: BASE_URL+"/listEvaluacionRiesgos",
        aoColumns: [
            { "data": "id" },
            { "data": "riesgo" },
            { "data": "probabilidad" },
            { "data": "impacto" },
            { "data": "valor" },
            { "data": "riesgo_controlado_probabilidad" },
            { "data": "riesgo_controlado_impacto" },
            { "data": "riesgo_controlado_valor" },
            {
                data:null,
                "mRender":function(data){
                    if(data.estado == 1){
                        return 'Activo';
                    }
                    return 'Inactivo'
                }
            },
            {
                data:null,
                "mRender":function(data){
                    return `<editEVA data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editEVA>
                    <deleteEVA data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteEVA>`
                }
            },
        ],
        columnDefs: [
            {
                // "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_evaluacion_riesgo tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}

$('#btn_add_evaluacion_riesgo').click(function(){
    $('#btn_add_evaluacion_riesgo').attr('disabled',true)
    let id_empresa_default = 0
    let tipo_riesgos = $.ajax({
        url:BASE_URL+"/main/getTipoRiesgos",
        dataType:'JSON'
    })
    .done(function(response){
        $('#modal_evaluacion_riesgo #tipo_riesgo option').remove()
        $('#modal_evaluacion_riesgo #tipo_riesgo').append(
            `<option value=''>Seleccionar</option>`
        )
        if(response.data.length > 0){
            response.data.forEach(element => {
                $('#modal_evaluacion_riesgo #tipo_riesgo').append(
                    `<option value='${element.id}'>${element.tipo_riesgo}</option>`
                )
            });
        }
    })
    let empresas = $.ajax({
        url:BASE_URL+"/activo/getEmpresas",
        dataType:'JSON'
    })
    .done(function(response){
        $('#modal_evaluacion_riesgo #empresa option').remove()
        $('#modal_evaluacion_riesgo #empresa').append(
            `<option value=''>Seleccionar</option>`
        )
        if(response.data.length > 0){
            id_empresa_default = response.data[0].id
            response.data.forEach(element => {
                $('#modal_evaluacion_riesgo #empresa').append(
                    `<option value='${element.id}'>${element.empresa}</option>`
                )
            });
        }
    })
    let areas = $.ajax({
        url:BASE_URL+"/activo/getArea",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #area option').remove()
        $('#modal_evaluacion_riesgo #area').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #area').append(
                    `<option value='${element.id}'>${element.area}</option>`
                )
            });
        }
    })
    let unidades = $.ajax({
        url:BASE_URL+"/activo/getUnidades",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #unidad option').remove()
        $('#modal_evaluacion_riesgo #unidad').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #unidad').append(
                    `<option value='${element.id}'>${element.unidad}</option>`
                )
            });
        }
    })
    let macroproceso = $.ajax({
        url:BASE_URL+"/activo/getMacroproceso",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #macroproceso option').remove()
        $('#modal_evaluacion_riesgo #macroproceso').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #macroproceso').append(
                    `<option value='${element.id}'>${element.macroproceso}</option>`
                )
            });
        }
    })
    let proceso = $.ajax({
        url:BASE_URL+"/activo/getProceso",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #proceso option').remove()
        $('#modal_evaluacion_riesgo #proceso').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #proceso').append(
                    `<option value='${element.id}'>${element.proceso}</option>`
                )
            });
        }
    })
    let tipos_amenaza = $.ajax({
        url:BASE_URL+"/main/getTiposAmenaza",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #tipo_amenaza option').remove()
        $('#modal_evaluacion_riesgo #tipo_amenaza').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #tipo_amenaza').append(
                    `<option value='${element.id}'>${element.tipo}</option>`
                )
            });
        }
    })
    let desc_amenaza = $.ajax({
        url:BASE_URL+"/main/getDescAmenaza",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #desc_amenaza option').remove()
        $('#modal_evaluacion_riesgo #desc_amenaza').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #desc_amenaza').append(
                    `<option value='${element.id}'>${element.amenaza}</option>`
                )
            });
        }
    })
    let tipo_vulnerabilidad = $.ajax({
        url:BASE_URL+"/main/getCategoriasVulnerabilidad",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #tipo_vulnerabilidad option').remove()
        $('#modal_evaluacion_riesgo #tipo_vulnerabilidad').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #tipo_vulnerabilidad').append(
                    `<option value='${element.id}'>${element.categoria}</option>`
                )
            });
        }
    })
    let desc_vulnerabilidad = $.ajax({
        url:BASE_URL+"/main/getDescVulnerabilidad",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #desc_vulnerabilidad option').remove()
        $('#modal_evaluacion_riesgo #desc_vulnerabilidad').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #desc_vulnerabilidad').append(
                    `<option value='${element.id}'>${element.vulnerabilidad}</option>`
                )
            });
        }
    })

    let activos = $.ajax({
        url:BASE_URL+"/getListInventarioClasificacionActivo",
        dataType:'json'
    })
    .done(function(respuesta){
        $('#modal_evaluacion_riesgo #activo option').remove()
        $('#modal_evaluacion_riesgo #activo').append(
            `<option value=''>Seleccionar</option>`
        )
        if(respuesta.data.length > 0){
            respuesta.data.forEach(element => {
                $('#modal_evaluacion_riesgo #activo').append(
                    `<option value='${element.ica_id}'>${element.activo}</option>`
                )
            });
        }
    })
    $('#btn_add_evaluacion_riesgo').attr('disabled',false)
    $("#modal_evaluacion_riesgo").modal("show");
    $('#title_eva').html('Agregar Evaluacion de riesgo')
    document.getElementById("form_eva").reset();
    document.getElementById("add_eva").style.display = "block";
    document.getElementById("update_eva").style.display = "none";
})
$('#add_eva').click(function(){
    $tipo_riesgo = $('#modal_evaluacion_riesgo #tipo_riesgo').val()
    $empresa = $('#modal_evaluacion_riesgo #empresa').val()
    $area = $('#modal_evaluacion_riesgo #area').val()
    $unidad = $('#modal_evaluacion_riesgo #unidad').val()
    $macroproceso = $('#modal_evaluacion_riesgo #macroproceso').val()
    $proceso = $('#modal_evaluacion_riesgo #proceso').val()
    $activo = $('#modal_evaluacion_riesgo #activo').val()
    $tipo_amenaza = $('#modal_evaluacion_riesgo #tipo_amenaza').val()
    $desc_amenaza = $('#modal_evaluacion_riesgo #desc_amenaza').val()
    $tipo_vulnerabilidad = $('#modal_evaluacion_riesgo #tipo_vulnerabilidad').val()
    $desc_vulnerabilidad = $('#modal_evaluacion_riesgo #desc_vulnerabilidad').val()
    $riesgo = $('#modal_evaluacion_riesgo #riesgo').val()
    $valor_probabilidad = $('#modal_evaluacion_riesgo #valor_probabilidad').val()
    $probabilidad = $('#modal_evaluacion_riesgo #probabilidad').val()
    $valor_impacto = $('#modal_evaluacion_riesgo #valor_impacto').val()
    $impacto = $('#modal_evaluacion_riesgo #impacto').val()
    $valor = $('#modal_evaluacion_riesgo #valor').val()
    $control = $('#modal_evaluacion_riesgo #control').val()
    $riesgo_controlado_probabilidad = $('#modal_evaluacion_riesgo #riesgo_controlado_probabilidad').val()
    $riesgo_controlado_impacto = $('#modal_evaluacion_riesgo #riesgo_controlado_impacto').val()
    $riesgo_controlado_valor = $('#modal_evaluacion_riesgo #riesgo_controlado_valor').val()
    $estado = $('#modal_evaluacion_riesgo #estado').val()

    if(
        $tipo_riesgo != "" &&
        $empresa != "" &&
        $area != "" &&
        $unidad != "" &&
        $macroproceso != "" &&
        $proceso != "" &&
        $activo != "" &&
        $tipo_amenaza != "" &&
        $desc_amenaza != "" &&
        $tipo_vulnerabilidad != "" &&
        $desc_vulnerabilidad != "" &&
        $riesgo != "" &&
        $valor_probabilidad != "" &&
        $probabilidad != "" &&
        $valor_impacto != "" &&
        $impacto != "" &&
        $valor != "" &&
        $control != "" &&
        $riesgo_controlado_probabilidad != "" &&
        $riesgo_controlado_impacto != "" &&
        $riesgo_controlado_valor != "" &&
        $estado != ""
    ){
        const postData = {
            id_tipo_riesgo:$tipo_riesgo,
            id_empresa:$empresa,
            id_area:$area,
            id_unidad:$unidad,
            id_macroproceso:$macroproceso,
            id_proceso:$proceso,
            id_activo:$activo,
            id_tipo_amenaza:$tipo_amenaza,
            id_descripcion_amenaza:$desc_amenaza,
            id_tipo_vulnerabilidad:$tipo_vulnerabilidad,
            id_descripcion_vulnerabilidad:$desc_vulnerabilidad,
            riesgo:$riesgo,
            valor_probabilidad:$valor_probabilidad,
            probabilidad:$probabilidad,
            valor_impacto:$valor_impacto,
            impacto:$impacto,
            valor:$valor,
            id_control:$control,
            riesgo_controlado_probabilidad:$riesgo_controlado_probabilidad,
            riesgo_controlado_impacto:$riesgo_controlado_impacto,
            riesgo_controlado_valor:$riesgo_controlado_valor,
            estado:$estado
        }
        try {
            $.ajax({
                method:'POST',
                url:BASE_URL+"/addEvaluacionRiesgo",
                data:postData,
                dataType:"JSON"
            })
            .done(function(response){
                console.log(response)
                if(!response.error){
                    document.getElementById('form_eva').reset()
                    $('#modal_evaluacion_riesgo').modal('hide')
                    alerta_evaluacion_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha guardado exitosamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_evaluacion_riesgo").DataTable().ajax.reload(null, false); 
                   
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.msg
                    })
                }
            })
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
            })
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Faltan Datos'
        })
    }
})
$("#table_evaluacion_riesgo").on('click','editEVA',function(event){
    $('#table_evaluacion_riesgo tbody editEVA').attr('disabled',true)

    let id_empresa_default = 0
    let tipo_riesgos = $.ajax({
        url:BASE_URL+"/main/getTipoRiesgos",
        dataType:'JSON'
    })
    .done(function(response){
        $('#modal_evaluacion_riesgo #tipo_riesgo option').remove()
        $('#modal_evaluacion_riesgo #tipo_riesgo').append(
            `<option value=''>Seleccionar</option>`
        )
        if(response.data.length > 0){
            response.data.forEach(element => {
                $('#modal_evaluacion_riesgo #tipo_riesgo').append(
                    `<option value='${element.id}'>${element.tipo_riesgo}</option>`
                )
            });
        }
    })
    let empresas = $.ajax({
        url:BASE_URL+"/activo/getEmpresas",
        dataType:'JSON'
    })
    .done(function(response){
        $('#modal_evaluacion_riesgo #empresa option').remove()
        $('#modal_evaluacion_riesgo #empresa').append(
            `<option value=''>Seleccionar</option>`
        )
        if(response.data.length > 0){
            id_empresa_default = response.data[0].id
            response.data.forEach(element => {
                $('#modal_evaluacion_riesgo #empresa').append(
                    `<option value='${element.id}'>${element.empresa}</option>`
                )
            });
        }
    })
    let areas = $.ajax({
        url:BASE_URL+"/activo/getArea",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #area option').remove()
        $('#modal_evaluacion_riesgo #area').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #area').append(
                    `<option value='${element.id}'>${element.area}</option>`
                )
            });
        }
    })
    let unidades = $.ajax({
        url:BASE_URL+"/activo/getUnidades",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #unidad option').remove()
        $('#modal_evaluacion_riesgo #unidad').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #unidad').append(
                    `<option value='${element.id}'>${element.unidad}</option>`
                )
            });
        }
    })
    let macroproceso = $.ajax({
        url:BASE_URL+"/activo/getMacroproceso",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #macroproceso option').remove()
        $('#modal_evaluacion_riesgo #macroproceso').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #macroproceso').append(
                    `<option value='${element.id}'>${element.macroproceso}</option>`
                )
            });
        }
    })
    let proceso = $.ajax({
        url:BASE_URL+"/activo/getProceso",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #proceso option').remove()
        $('#modal_evaluacion_riesgo #proceso').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #proceso').append(
                    `<option value='${element.id}'>${element.proceso}</option>`
                )
            });
        }
    })
    let tipos_amenaza = $.ajax({
        url:BASE_URL+"/main/getTiposAmenaza",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #tipo_amenaza option').remove()
        $('#modal_evaluacion_riesgo #tipo_amenaza').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #tipo_amenaza').append(
                    `<option value='${element.id}'>${element.tipo}</option>`
                )
            });
        }
    })
    let desc_amenaza = $.ajax({
        url:BASE_URL+"/main/getDescAmenaza",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #desc_amenaza option').remove()
        $('#modal_evaluacion_riesgo #desc_amenaza').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #desc_amenaza').append(
                    `<option value='${element.id}'>${element.amenaza}</option>`
                )
            });
        }
    })
    let tipo_vulnerabilidad = $.ajax({
        url:BASE_URL+"/main/getCategoriasVulnerabilidad",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #tipo_vulnerabilidad option').remove()
        $('#modal_evaluacion_riesgo #tipo_vulnerabilidad').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #tipo_vulnerabilidad').append(
                    `<option value='${element.id}'>${element.categoria}</option>`
                )
            });
        }
    })
    let desc_vulnerabilidad = $.ajax({
        url:BASE_URL+"/main/getDescVulnerabilidad",
        dataType:'JSON'
    })
    .done(function(resarea){
        $('#modal_evaluacion_riesgo #desc_vulnerabilidad option').remove()
        $('#modal_evaluacion_riesgo #desc_vulnerabilidad').append(
            `<option value=''>Seleccionar</option>`
        )
        if(resarea.data.length > 0){
            resarea.data.forEach(element => {
                $('#modal_evaluacion_riesgo #desc_vulnerabilidad').append(
                    `<option value='${element.id}'>${element.vulnerabilidad}</option>`
                )
            });
        }
    })

    let activos = $.ajax({
        url:BASE_URL+"/getListInventarioClasificacionActivo",
        dataType:'json'
    })
    .done(function(respuesta){
        $('#modal_evaluacion_riesgo #activo option').remove()
        $('#modal_evaluacion_riesgo #activo').append(
            `<option value=''>Seleccionar</option>`
        )
        if(respuesta.data.length > 0){
            respuesta.data.forEach(element => {
                $('#modal_evaluacion_riesgo #activo').append(
                    `<option value='${element.ica_id}'>${element.activo}</option>`
                )
            });
        }
    })

    $("#modal_evaluacion_riesgo").modal("show");

    Promise.all([
        tipo_riesgos,
        empresas,
        areas,
        unidades,
        macroproceso,
        proceso,
        tipos_amenaza,
        desc_amenaza,
        tipo_vulnerabilidad,
        desc_vulnerabilidad,
        activos
    ]).then(() => {
        $.ajax({
            url:BASE_URL+"/getEvaluacionRiesgo/"+event.currentTarget.getAttribute('data-id'),
            dataType:'JSON'
        })
        .done(function(res){
            if(res.data.length > 0){
                $('#table_evaluacion_riesgo tbody editEVA').attr('disabled',false)
                document.getElementById("form_eva").reset();
                document.getElementById("add_eva").style.display = "none";
                document.getElementById("update_eva").style.display = "block";
                $('#title_ica').html('Editar Evaluacion de Riesgo')
                if(res.data[0].estado == 3){
                    $('#modal_evaluacion_riesgo #estado option').remove()
                    $('#modal_evaluacion_riesgo #estado').append(
                        `
                            <option value="3">Observado</option>
                            <option value="2">Registrado</option>
                        `
                    )
                    $("#modal_evaluacion_riesgo .input_observacion").show()
                }
                $("#modal_evaluacion_riesgo #id_eva").val(event.currentTarget.getAttribute('data-id'));
                $("#modal_evaluacion_riesgo #tipo_riesgo").val(res.data[0].id_tipo_riesgo);
                $("#modal_evaluacion_riesgo #empresa").val(res.data[0].id_empresa);
                $("#modal_evaluacion_riesgo #area").val(res.data[0].id_area);
                $("#modal_evaluacion_riesgo #unidad").val(res.data[0].id_unidad);
                $("#modal_evaluacion_riesgo #macroproceso").val(res.data[0].id_macroproceso);
                $("#modal_evaluacion_riesgo #proceso").val(res.data[0].id_proceso);
                $("#modal_evaluacion_riesgo #activo").val(res.data[0].id_activo);
                $("#modal_evaluacion_riesgo #tipo_amenaza").val(res.data[0].id_tipo_amenaza);
                $("#modal_evaluacion_riesgo #desc_amenaza").val(res.data[0].id_descripcion_amenaza);
                $("#modal_evaluacion_riesgo #tipo_vulnerabilidad").val(res.data[0].id_tipo_vulnerabilidad);
                $("#modal_evaluacion_riesgo #desc_vulnerabilidad").val(res.data[0].id_descripcion_vulnerabilidad);
                $("#modal_evaluacion_riesgo #riesgo").val(res.data[0].riesgo);
                $("#modal_evaluacion_riesgo #valor_probabilidad").val(res.data[0].valor_probabilidad);
                $("#modal_evaluacion_riesgo #probabilidad").val(res.data[0].probabilidad);
                $("#modal_evaluacion_riesgo #valor_impacto").val(res.data[0].valor_impacto);
                $("#modal_evaluacion_riesgo #impacto").val(res.data[0].impacto);
                $("#modal_evaluacion_riesgo #valor").val(res.data[0].valor);
                $("#modal_evaluacion_riesgo #control").val(res.data[0].id_control);
                $("#modal_evaluacion_riesgo #riesgo_controlado_probabilidad").val(res.data[0].riesgo_controlado_probabilidad);
                $("#modal_evaluacion_riesgo #riesgo_controlado_impacto").val(res.data[0].riesgo_controlado_impacto);
                $("#modal_evaluacion_riesgo #riesgo_controlado_valor").val(res.data[0].riesgo_controlado_valor);
                $("#modal_evaluacion_riesgo #estado").val(res.data[0].estado);
            }
        })
    })

})
$('#button_close_modal_eva,#button_cancel_modal_eva').click(function(){
    $('#modal_evaluacion_riesgo').modal('hide');
})

$('#update_eva').click(function(){
    $id = $('#modal_evaluacion_riesgo #id_eva').val()
    $tipo_riesgo = $('#modal_evaluacion_riesgo #tipo_riesgo').val()
    $empresa = $('#modal_evaluacion_riesgo #empresa').val()
    $area = $('#modal_evaluacion_riesgo #area').val()
    $unidad = $('#modal_evaluacion_riesgo #unidad').val()
    $macroproceso = $('#modal_evaluacion_riesgo #macroproceso').val()
    $proceso = $('#modal_evaluacion_riesgo #proceso').val()
    $activo = $('#modal_evaluacion_riesgo #activo').val()
    $tipo_amenaza = $('#modal_evaluacion_riesgo #tipo_amenaza').val()
    $desc_amenaza = $('#modal_evaluacion_riesgo #desc_amenaza').val()
    $tipo_vulnerabilidad = $('#modal_evaluacion_riesgo #tipo_vulnerabilidad').val()
    $desc_vulnerabilidad = $('#modal_evaluacion_riesgo #desc_vulnerabilidad').val()
    $riesgo = $('#modal_evaluacion_riesgo #riesgo').val()
    $valor_probabilidad = $('#modal_evaluacion_riesgo #valor_probabilidad').val()
    $probabilidad = $('#modal_evaluacion_riesgo #probabilidad').val()
    $valor_impacto = $('#modal_evaluacion_riesgo #valor_impacto').val()
    $impacto = $('#modal_evaluacion_riesgo #impacto').val()
    $valor = $('#modal_evaluacion_riesgo #valor').val()
    $control = $('#modal_evaluacion_riesgo #control').val()
    $riesgo_controlado_probabilidad = $('#modal_evaluacion_riesgo #riesgo_controlado_probabilidad').val()
    $riesgo_controlado_impacto = $('#modal_evaluacion_riesgo #riesgo_controlado_impacto').val()
    $riesgo_controlado_valor = $('#modal_evaluacion_riesgo #riesgo_controlado_valor').val()
    $estado = $('#modal_evaluacion_riesgo #estado').val()

    if(
        $tipo_riesgo != "" &&
        $empresa != "" &&
        $area != "" &&
        $unidad != "" &&
        $macroproceso != "" &&
        $proceso != "" &&
        $activo != "" &&
        $tipo_amenaza != "" &&
        $desc_amenaza != "" &&
        $tipo_vulnerabilidad != "" &&
        $desc_vulnerabilidad != "" &&
        $riesgo != "" &&
        $valor_probabilidad != "" &&
        $probabilidad != "" &&
        $valor_impacto != "" &&
        $impacto != "" &&
        $valor != "" &&
        $control != "" &&
        $riesgo_controlado_probabilidad != "" &&
        $riesgo_controlado_impacto != "" &&
        $riesgo_controlado_valor != "" &&
        $estado != ""
    ){
        const postData = {
            id_tipo_riesgo:$tipo_riesgo,
            id_empresa:$empresa,
            id_area:$area,
            id_unidad:$unidad,
            id_macroproceso:$macroproceso,
            id_proceso:$proceso,
            id_activo:$activo,
            id_tipo_amenaza:$tipo_amenaza,
            id_descripcion_amenaza:$desc_amenaza,
            id_tipo_vulnerabilidad:$tipo_vulnerabilidad,
            id_descripcion_vulnerabilidad:$desc_vulnerabilidad,
            riesgo:$riesgo,
            valor_probabilidad:$valor_probabilidad,
            probabilidad:$probabilidad,
            valor_impacto:$valor_impacto,
            impacto:$impacto,
            valor:$valor,
            id_control:$control,
            riesgo_controlado_probabilidad:$riesgo_controlado_probabilidad,
            riesgo_controlado_impacto:$riesgo_controlado_impacto,
            riesgo_controlado_valor:$riesgo_controlado_valor,
            estado:$estado
        }
        try {
            $.ajax({
                method:'POST',
                url:BASE_URL+"/updateEvaluacionRiesgo/"+$id,
                data:postData,
                dataType:"JSON"
            })
            .done(function(response){
                console.log(response)
                if(!response.error){
                    document.getElementById('form_eva').reset()
                    $('#modal_evaluacion_riesgo').modal('hide')
                    alerta_evaluacion_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha modificado exitosamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_evaluacion_riesgo").DataTable().ajax.reload(null, false); 
                   
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.msg
                    })
                }
            })
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
            })
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Faltan Datos'
        })
    }
})

$('#table_evaluacion_riesgo tbody').on( 'click', 'deleteEVA', function(event){

    //recuperando los datos
    let id = event.currentTarget.getAttribute('data-id')
    Swal.fire({
        title: 'Desea eliminar la evaluacion de riesgo?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "post",
                url: BASE_URL+"/deleteEvaluacionRiesgo/"+Number(id),
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (!respuesta.error) 
                {
                    alerta_evaluacion_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha eliminado satisfactoriamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_evaluacion_riesgo").DataTable().ajax.reload(null, false); 
                   
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: respuesta.msg
                    }) 
                }
                
            })
            .fail(function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
                })
            })
            .always(function() {
            });
        } else if (result.isDenied) {
            Swal.fire('No hubo ningún cambio', '', 'info')
        }
    })
    
});
$('#modal_evaluacion_riesgo #valor_probabilidad').on('input',function(){
    let value = $('#modal_evaluacion_riesgo #valor_probabilidad').val()
    if(escenario == 2){
        $.ajax({
            method: "get",
            url: BASE_URL+"/main/getProbabilidadRiesgo/"+escenario,
            dataType: "JSON"
        })
        .done(function(respuesta) {
            $('#modal_evaluacion_riesgo #probabilidad').val('')
            let found = false
            respuesta.data.forEach(element => {
                if(!found){
                    // OPERADOR 1
                    if(element.operador1 == ">"){
                        if(element.operador2 == "<"){
                            if(value>element.valor1 && value<element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == "<="){
                            if(value>element.valor1 && value<=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador1 == ">="){
                        if(element.operador2 == "<"){
                            if(value>=element.valor1 && value<element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == "<="){
                            if(value>=element.valor1 && value<=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador1 == "<"){
                        if(element.operador2 == ">"){
                            if(value<element.valor1 && value>element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == ">="){
                            if(value<element.valor1 && value>=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador1 == "<="){
                        if(element.operador2 == ">"){
                            if(value<=element.valor1 && value>element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == ">="){
                            if(value<=element.valor1 && value>=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    // OPERADOR 2
                    if(element.operador2 == ">"){
                        if(element.operador1 == "<"){
                            if(value > element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value>element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador2 == ">="){
                        if(element.operador1 == "<"){
                            if(value >= element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value>=element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador2 == "<"){
                        if(element.operador1 == "<"){
                            if(value < element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value<element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador2 == "<="){
                        if(element.operador1 == "<"){
                            if(value <= element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value <= element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_probabilidad').val(element.id)
                                $('#modal_evaluacion_riesgo #probabilidad').val(element.descripcion)
                            }
                        }
                    }
                }
            });
            
        })
        .fail(function(error) {
        })
        .always(function() {
        });
    }else{
        $.ajax({
            method: "get",
            url: BASE_URL+"/main/getProbabilidadRiesgo/"+escenario,
            dataType: "JSON"
        })
        .done(function(respuesta){
            console.log(respuesta.data)
            if(respuesta.data.length > 0){
                if(respuesta.data[0].tipo_valor == 'Formula'){
                    $('#modal_evaluacion_riesgo #id_probabilidad').val(respuesta.data[0].id)
                    let formula = respuesta.data[0].formula
                    let split_formula = formula.split(" ")
                    console.log(formula)
                    console.log(split_formula)
                    for (let index = 0; index < split_formula.length; index=index+3) {
                        let operador = split_formula[index]
                        let valor = Number(split_formula[index+1])
                        let resultado = split_formula[index+2]
                        switch (operador) {
                            case '=':
                                if(value == valor){
                                    $('#modal_evaluacion_riesgo #probabilidad').val(resultado)
                                }
                                break;
                            case '>':
                                if(value > valor){
                                    $('#modal_evaluacion_riesgo #probabilidad').val(resultado)
                                }
                                break;
                            case '>=':
                                if(value >= valor){
                                    $('#modal_evaluacion_riesgo #probabilidad').val(resultado)
                                }
                                break;
                            case '<':
                                if(value < valor){
                                    $('#modal_evaluacion_riesgo #probabilidad').val(resultado)
                                }
                                break;
                            case '<=':
                                if(value <= valor){
                                    $('#modal_evaluacion_riesgo #probabilidad').val(resultado)
                                }
                                break;
                        
                            default:
                                break;
                        }
                        console.log(operador,valor,resultado)
                    }
                }
            }
        })
        .fail(function(error) {
        })
        .always(function() {
        });
    }
})
$('#modal_evaluacion_riesgo #valor_impacto').on('input',function(){
    let value = $('#modal_evaluacion_riesgo #valor_impacto').val()
    if(escenario == 2){
        $.ajax({
            method: "get",
            url: BASE_URL+"/main/getImpactoRiesgo/"+escenario,
            dataType: "JSON"
        })
        .done(function(respuesta) {
            $('#modal_evaluacion_riesgo #impacto').val('')
            let found = false
            respuesta.data.forEach(element => {
                if(!found){
                    // OPERADOR 1
                    if(element.operador1 == ">"){
                        if(element.operador2 == "<"){
                            if(value>element.valor1 && value<element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == "<="){
                            if(value>element.valor1 && value<=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador1 == ">="){
                        if(element.operador2 == "<"){
                            if(value>=element.valor1 && value<element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == "<="){
                            if(value>=element.valor1 && value<=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador1 == "<"){
                        if(element.operador2 == ">"){
                            if(value<element.valor1 && value>element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == ">="){
                            if(value<element.valor1 && value>=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador1 == "<="){
                        if(element.operador2 == ">"){
                            if(value<=element.valor1 && value>element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador2 == ">="){
                            if(value<=element.valor1 && value>=element.valor2){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    // OPERADOR 2
                    if(element.operador2 == ">"){
                        if(element.operador1 == "<"){
                            if(value > element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value>element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador2 == ">="){
                        if(element.operador1 == "<"){
                            if(value >= element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value>=element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador2 == "<"){
                        if(element.operador1 == "<"){
                            if(value < element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value<element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                    if(element.operador2 == "<="){
                        if(element.operador1 == "<"){
                            if(value <= element.valor2 && value<element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                        if(element.operador1 == "<="){
                            if(value <= element.valor && value<=element.valor1){
                                found = true
                                $('#modal_evaluacion_riesgo #id_impacto').val(element.id)
                                $('#modal_evaluacion_riesgo #impacto').val(element.descripcion)
                            }
                        }
                    }
                }
            });
    
            if(escenario == 2){
                getValoracionByProbabilidadImpacto()
            }else{
                $.ajax({
                    method: "GET",
                    url: BASE_URL+"/main/getProbabilidadRiesgo/"+escenario,
                    dataType: "JSON"
                })
                .done(function(respuesta){
                    console.log(respuesta)
                    if(respuesta.data.length > 0){
                        if(respuesta.data[0].tipo_valor == "Numero"){
                            // BUSACAR EN NIVEL DE RIESGO
                            let value = Number($('#modal_evaluacion_riesgo #valor_probabilidad').val())*Number($('#modal_evaluacion_riesgo #valor_impacto').val())
                            getNivelRiesgo(value)
                        }else{
                            if(respuesta.data[0].tipo_valor == "Formula"){
                                getValoracionByProbabilidadImpacto()
                            }
                        }
                    }
                })
            }
            
        })
        .fail(function(error) {
        })
        .always(function() {
        });
    }else{
        $.ajax({
            method: "get",
            url: BASE_URL+"/main/getImpactoRiesgo/"+escenario,
            dataType: "JSON"
        })
        .done(function(respuesta){
            console.log(respuesta.data.length)
            if(respuesta.data.length > 0){
                if(respuesta.data[0].tipo_valor == 'Formula'){
                    $('#modal_evaluacion_riesgo #id_impacto').val(respuesta.data[0].id)
                    let formula = respuesta.data[0].formula
                    let split_formula = formula.split(" ")
                    console.log(formula)
                    console.log(split_formula)
                    for (let index = 0; index < split_formula.length; index=index+3) {
                        let operador = split_formula[index]
                        let valor = Number(split_formula[index+1])
                        let resultado = split_formula[index+2]
                        switch (operador) {
                            case '=':
                                if(value == valor){
                                    $('#modal_evaluacion_riesgo #impacto').val(resultado)
                                }
                                break;
                            case '>':
                                if(value > valor){
                                    $('#modal_evaluacion_riesgo #impacto').val(resultado)
                                }
                                break;
                            case '>=':
                                if(value >= valor){
                                    $('#modal_evaluacion_riesgo #impacto').val(resultado)
                                }
                                break;
                            case '<':
                                if(value < valor){
                                    $('#modal_evaluacion_riesgo #impacto').val(resultado)
                                }
                                break;
                            case '<=':
                                if(value <= valor){
                                    $('#modal_evaluacion_riesgo #impacto').val(resultado)
                                }
                                break;
                        
                            default:
                                break;
                        }
                        console.log(operador,valor,resultado)
                    }
                }
                getValoracionByProbabilidadImpacto()

            }
        })
        .fail(function(error) {
        })
        .always(function() {
        });
    }
})

function getValoracionByProbabilidadImpacto(){
    $.ajax({
        method: "POST",
        url: BASE_URL+"/getValoracionByProbabilidadImpacto",
        data:{
            id_probabilidad:$('#modal_evaluacion_riesgo #id_probabilidad').val(),
            id_impacto:$('#modal_evaluacion_riesgo #id_impacto').val()
        },
        dataType: "JSON"
    })
    .done(function(respuesta){
        console.log(respuesta)
        if(respuesta.data.length > 0){
            $('#modal_evaluacion_riesgo #valor').val(respuesta.data[0].valor)
        }
    })
}

function getNivelRiesgo(value){
    $.ajax({
        method:"get",
        url:BASE_URL+"/main/getNivelRiesgo",
        dataType: "JSON"
    })
    .done(function(respuesta){
        $('#modal_evaluacion_riesgo #valor').val('')
        let found = false
        respuesta.data.forEach(element => {
            if(!found){
                // OPERADOR 1
                if(element.operador1 == ">"){
                    if(element.operador2 == "<"){
                        if(value>element.valor1 && value<element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador2 == "<="){
                        if(value>element.valor1 && value<=element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                if(element.operador1 == ">="){
                    if(element.operador2 == "<"){
                        if(value>=element.valor1 && value<element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador2 == "<="){
                        if(value>=element.valor1 && value<=element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                if(element.operador1 == "<"){
                    if(element.operador2 == ">"){
                        if(value<element.valor1 && value>element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador2 == ">="){
                        if(value<element.valor1 && value>=element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                if(element.operador1 == "<="){
                    if(element.operador2 == ">"){
                        if(value<=element.valor1 && value>element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador2 == ">="){
                        if(value<=element.valor1 && value>=element.valor2){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                // OPERADOR 2
                if(element.operador2 == ">"){
                    if(element.operador1 == "<"){
                        if(value > element.valor2 && value<element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador1 == "<="){
                        if(value>element.valor && value<=element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                if(element.operador2 == ">="){
                    if(element.operador1 == "<"){
                        if(value >= element.valor2 && value<element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador1 == "<="){
                        if(value>=element.valor && value<=element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                if(element.operador2 == "<"){
                    if(element.operador1 == "<"){
                        if(value < element.valor2 && value<element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador1 == "<="){
                        if(value<element.valor && value<=element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
                if(element.operador2 == "<="){
                    if(element.operador1 == "<"){
                        if(value <= element.valor2 && value<element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                    if(element.operador1 == "<="){
                        if(value <= element.valor && value<=element.valor1){
                            found = true
                            $('#modal_evaluacion_riesgo #valor').val(element.descripcion)
                        }
                    }
                }
            }
        });
    })
}

$('#btn_view_riesgos').click(function(){
    $('#modal_evaluacion_resumen').modal('show');
    $.ajax({
        url:BASE_URL+"/countByValor",
        dataType:'json'
    })
    .done(function(respuesta){
        console.log(respuesta)
        $('#modal_evaluacion_resumen .wrapper_resumen_riesgos .group_resumen_riesgo').remove()
        if(respuesta.data.length > 0){
            respuesta.data.map(item => {
                $('#modal_evaluacion_resumen .wrapper_resumen_riesgos').append(
                    `
                        <div class="group_resumen_riesgo">
                            <p class="title_resumen_riesgo">${item.valor}</p>
                            <p class="count_resumen_riesgo">${item.cantidad}</p>
                        </div>
                    `
                )
            })
        }else{
            $('#modal_evaluacion_resumen .wrapper_resumen_riesgos').append(
                `
                    <p>No hay riesgos</p>
                `
            )
        }
    })
})
$('#button_close_modal_resumen,#button_cancel_modal_resumen').click(function(){
    $('#modal_evaluacion_resumen').modal('hide');
})
