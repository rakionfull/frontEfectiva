<?=$this->extend('Layout/main')?> 
<?=$this->section('content')?>
<div class="spinner-border" id="spinner_evaluacion" role="status" style="display:none;justify-content: center; align-items: center;">
  <span class="visually-hidden"></span>
</div>
<link rel="stylesheet" href="<?=base_url('public/assets/css/evaluacion_riesgos.css'); ?>">
    <div class="row" id="apart_evaluacion">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-md-4">
                            <h4 class="card-title">Lista de Evaluacion de Riesgos</h4>
                        </div>
                       
                        
                        <div class="col-12" style="margin-top:0.5rem" id="alerta_evaluacion_riesgo">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-between">
                        <div class="d-flex row col-12">
                            <div class="col-12 col-md-2">
                                <button type="button" id="btn_reload_valores" class="d-flex align-items-center  float-right btn btn-primary waves-effect waves-light"><i class="fas fa-rotate align-middle mr-2 ml-2"></i> Actualizar</button>
                            </div>
                            <div class="col-12 col-md-2 ">
                                <button type="button" id="btn_view_riesgos" class="d-flex align-items-center  float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-info align-middle mr-2 ml-2"></i> Resumen</button>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <a href="<?= base_url('exportExcelEVAHistorial')?>"class="d-flex align-items-center float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-download align-middle mr-2 ml-2"></i> Export Historicos</a>
                            </div>
                            <div class="col-12 col-md-2 ">
                                <a href="<?= base_url('exportExcelEVA')?>"class="d-flex align-items-center float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-download align-middle mr-2 ml-2"></i> Export</a>
                            </div>
                            <div class="col-12 col-md-2 ">
                                <button type="button" id="btn_add_evaluacion_riesgo" class="d-flex align-items-center  float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> A??adir</button>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $session = session();
                        if($session->getFlashdata('error') != '')
                        {
                        echo $session->getFlashdata('error');;
                        }
                    ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_evaluacion_riesgo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th rowspan="2">ID</th>
                                    <th rowspan="2">Riesgo</th>
                                    <th colspan="3" class="text-center">Riesgo Absoluto</th>
                                    <th colspan="3" class="text-center">Riesgo Controlado</th>
                                    <th rowspan="2">Estado</th>
                                    <th rowspan="2" style="width: 120px;">Mantenimiento</th>
                                </tr>
                                <tr>
                                    <th>Probabilidad</th>
                                    <th>Impacto</th>
                                    <th>Valor</th>
                                    <th>Probabilidad</th>
                                    <th>Impacto</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL RESUMEN -->
    <div class="modal fade" id="modal_evaluacion_resumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Resumen de Riesgos</h5>
                        <button id="button_close_modal_resumen" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body" id="body_resumen_riesgos">
                    <div class="wrapper_resumen_riesgos">
                        <div class="group_resumen_riesgo">
                            <p class="title_resumen_riesgo">Muy Altos</p>
                            <p class="count_resumen_riesgo">2</p>
                        </div>
                        <div class="group_resumen_riesgo">
                            <p class="title_resumen_riesgo">Alto</p>
                            <p class="count_resumen_riesgo">7</p>
                        </div>
                        <div class="group_resumen_riesgo">
                            <p class="title_resumen_riesgo">Medio</p>
                            <p class="count_resumen_riesgo">1</p>
                        </div>
                        <div class="group_resumen_riesgo">
                            <p class="title_resumen_riesgo">Bajo</p>
                            <p class="count_resumen_riesgo">0</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="button_cancel_modal_resumen" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
       </div>
    </div>
    <!-- END RESUMEN -->
    <!-- MODAL CREATE EVALUACION RIESGO -->
    <div class="modal fade" id="modal_evaluacion_riesgo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_eva"></h5>
                        <button id="button_close_modal_eva" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_eva" class="in-line">
                        <input type="hidden" id="id_eva">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Riesgo: </span>
                                        <select required name="" id="tipo_riesgo" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Empresa: </span>
                                        <select required name="" id="empresa" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Area: </span>
                                        <select required name="" id="area" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Unidad: </span>
                                        <select required name="" id="unidad" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Macroproceso: </span>
                                        <select required name="" id="macroproceso" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Proceso: </span>
                                        <select required name="" id="proceso" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Activo: </span>
                                        <select required name="" id="activo" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="1">Activo 1</option>
                                            <option value="2">Activo 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Amenaza: </span>
                                        <select required name="" id="tipo_amenaza" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Descripcion de Amenaza</span>
                                        <select required name="" id="desc_amenaza" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Vulnerabilidad: </span>
                                        <select required name="" id="tipo_vulnerabilidad" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Descripcion de Vulnerabilidad: </span>
                                        <select required name="" id="desc_vulnerabilidad" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Riesgo: </span>
                                        <input required type="text" class="form-control form-control-sm" id="riesgo">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Valor Probabilidad: </span>
                                        <input required type="number" class="form-control form-control-sm" id="valor_probabilidad">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Probabilidad: </span>
                                        <input type="hidden" id="id_probabilidad">
                                        <input required type="text" class="form-control form-control-sm" id="probabilidad">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Valor Impacto: </span>
                                        <input type="hidden" id="id_impacto">
                                        <input required type="text" class="form-control form-control-sm" id="valor_impacto">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Impacto: </span>
                                        <input required type="text" class="form-control form-control-sm" id="impacto">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Valor: </span>
                                        <input required type="text" class="form-control form-control-sm" id="valor">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Control: </span>
                                        <select required name="" id="control" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="1">Control 1</option>
                                            <option value="2">Control 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Riesgo Controlado Probabilidad: </span>
                                        <input required type="text" class="form-control form-control-sm" id="riesgo_controlado_probabilidad">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Riesgo Controlado Impacto: </span>
                                        <input required type="text" class="form-control form-control-sm" id="riesgo_controlado_impacto">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Riesgo Controlado Valor: </span>
                                        <input required type="text" class="form-control form-control-sm" id="riesgo_controlado_valor">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Estado: </span>
                                        <select required name="" id="estado" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_eva">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_eva">Guardar</button>
                    <button id="button_cancel_modal_eva" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREATE EVALUACION RIESGO -->
    <script>
        var escenario = <?php echo json_encode($escenario); ?>;
    </script>
    <script src="<?=base_url('public/assets/js/riesgos/evaluacion_riesgo.js'); ?>"></script>
<?=$this->endSection()?> 
