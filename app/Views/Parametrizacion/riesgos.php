<?=$this->extend('Layout/main')?> 
<?=$this->section('content')?>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header" style="background:#fff;border-bottom: 2px solid #f1f5f7">
                        <div class="col-md-12 text-center">
                            Parametrizacón de Riesgos
                        </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <ul class="menu">
                            <li id="tipo_riesgo" ><a href="#/TipoRiesgo" >Tipo de riesgo</a></li>
                            <li id="probabilidad_riesgo"><a href="#/ProbabilidadRiesgo">Probabilidad del riesgo</a></li>
                            <li id="impacto_riesgo"><a href="#/ImpactoRiesgo" >Impacto de riesgo</a></li>
                            <li id="nivel_riesgo"><a href="#/NivelRiesgo" >Nivel de riesgo</a></li>
                            <li id="ValoracionRiesgo"><a href="#/ValoracionRiesgo" >Valoración del riesgo</a></li>
                            <li id="tipo_amenaza"><a href="#/TipoAmenaza" >Tipo de amenaza</a></li>
                            <li id="descripcion_amenaza" ><a href="#/DescAmenaza" >Descripción de amenaza</a></li>
                            <li id="categoria_vulnerabilidad" ><a href="#/CategoriaVulnerabilidad" >Categoría de vulnerabilidad</a></li>
                            <li id="descripcion_vulnerabilidad"><a href="#/DescVulnerabilidad">Descripción de vulnerabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
        <div  id="apartValoracionRiesgo"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Valoracion de Riesgo</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_ValoracionRiesgo" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_ValoracionRiesgo">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_ValoracionRiesgo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>   
                                                            <th>Probabilidad</th>                                                      
                                                            <th>Probabilidad</th>
                                                            <th>Impacto</th>
                                                            <th>Impacto</th>
                                                            <th>Valor</th>
                                                         
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                          
                        </div>
                       
            </div>
            <div id="apartTipoRiesgo" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Tipo de riesgo</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_tipo_reisgo" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_tipo_riesgo">
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
                            <table id="table_tipo_riesgo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Tipo de riesgos</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th style="width: 120px;">Mantenimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="apartProbabilidadRiesgo" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Probabilidad de riesgo</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_probabilidad_1" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                <button style="display:none;" type="button" id="btn_add_probabilidad_2" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_probabilidad_riesgo">
                            </div>
                        </div>
                        <?php 
                            $session = session();
                            if($session->getFlashdata('error') != '')
                            {
                            echo $session->getFlashdata('error');;
                            }
                        ?>
                        <div class="row d-block">
                            <ul class="nav nav-tabs" id="myTabEscenariosProbabilidad" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="probabilidad-1-tab" data-bs-toggle="tab" data-bs-target="#probabilidad-1-tab-pane" type="button" role="tab" aria-controls="probabilidad-1-tab-pane" aria-selected="true">Escenario 1</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="probabilidad-2-tab" data-bs-toggle="tab" data-bs-target="#probabilidad-2-tab-pane" type="button" role="tab" aria-controls="probabilidad-2-tab-pane" aria-selected="true">Escenario 2</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabEscenariosProbabilidadContent">
                                <div class="tab-pane fade show active" id="probabilidad-1-tab-pane" role="tabpanel" aria-labelledby="probabilidad-1-tab" tabindex="0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table_probabilidad_1" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>                                                         
                                                        <th>Descripción</th>
                                                        <th>Tipo de Regla</th>
                                                        <th>Formula</th>
                                                        <th>Tipo de Valor</th>
                                                        <th>Comentario</th>
                                                        <th>Estado</th>
                                                        <th style="width: 120px;">Mantenimiento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="probabilidad-2-tab-pane" role="tabpanel" aria-labelledby="probabilidad-2-tab" tabindex="0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table_probabilidad_2" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>                                                         
                                                        <th>Descripción</th>
                                                        <th>Tipo de Regla</th>
                                                        <th>Tipo de Valor</th>
                                                        <th>Operador 1</th>
                                                        <th>Valor 1</th>
                                                        <th>Operador 2</th>
                                                        <th>Valor 2</th>
                                                        <th>Comentario</th>
                                                        <th>Estado</th>
                                                        <th style="width: 120px;">Mantenimiento</th>
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
                    </div>
                </div>
            </div>
            <div id="apartImpactoRiesgo" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Impacto de riesgo</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_impacto_1" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                <button style="display:none;" type="button" id="btn_add_impacto_2" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_impacto_riesgo">
                            </div>
                        </div>
                        <?php 
                            $session = session();
                            if($session->getFlashdata('error') != '')
                            {
                            echo $session->getFlashdata('error');;
                            }
                        ?>
                        <div class="row d-block">
                            <ul class="nav nav-tabs" id="myTabEscenariosImpacto" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="impacto-1-tab" data-bs-toggle="tab" data-bs-target="#impacto-1-tab-pane" type="button" role="tab" aria-controls="impacto-1-tab-pane" aria-selected="true">Escenario 1</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="impacto-2-tab" data-bs-toggle="tab" data-bs-target="#impacto-2-tab-pane" type="button" role="tab" aria-controls="impacto-2-tab-pane" aria-selected="true">Escenario 2</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabEscenariosImpactoContent">
                                <div class="tab-pane fade show active" id="impacto-1-tab-pane" role="tabpanel" aria-labelledby="impacto-1-tab" tabindex="0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table_impacto_1" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>                                                         
                                                        <th>Descripción</th>
                                                        <th>Tipo de Regla</th>
                                                        <th>Formula</th>
                                                        <th>Tipo de Valor</th>
                                                        <th>Comentario</th>
                                                        <th>Estado</th>
                                                        <th style="width: 120px;">Mantenimiento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="impacto-2-tab-pane" role="tabpanel" aria-labelledby="impacto-2-tab" tabindex="0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table_impacto_2" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>                                                         
                                                        <th>Descripción</th>
                                                        <th>Tipo de Regla</th>
                                                        <th>Tipo de Valor</th>
                                                        <th>Operador 1</th>
                                                        <th>Valor 1</th>
                                                        <th>Operador 2</th>
                                                        <th>Valor 2</th>
                                                        <th>Comentario</th>
                                                        <th>Estado</th>
                                                        <th style="width: 120px;">Mantenimiento</th>
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
                    </div>
                </div>
            </div>
            <div id="apartNivelRiesgo" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Nivel de riesgo</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_nivel_riesgo" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_nivel_riesgo">
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
                            <table id="table_nivel_riesgo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Operador 1</th>
                                        <th>Valor 1</th>
                                        <th>Operador 2</th>
                                        <th>Valor 2</th>
                                        <th>Color</th>
                                        <th>Descripción</th>
                                        <th>Comentario</th>
                                        <th>Estado</th>
                                        <th style="width: 120px;">Mantenimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="apartTipoAmenaza" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Tipos de Amenaza</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_tipo_amenaza" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_tipo_amenaza">
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
                            <table id="table_tipo_amenaza" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th style="width: 120px;">Mantenimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="apartDescAmenaza" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Descripcion de Amenazas</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_desc_amenaza" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_desc_amenaza">
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
                            <table id="table_desc_amenaza" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Amenaza</th>
                                        <th style="width: 120px;">Mantenimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="apartCategoriaVulnerabilidad" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Categorías de Vulnerabilidad</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_categoria_vulnerabilidad" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_categoria_vulnerabilidad">
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
                            <table id="table_categoria_vulnerabilidad" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Categoria</th>
                                        <th>Estado</th>
                                        <th style="width: 120px;">Mantenimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="apartDescVulnerabilidad" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Descripciones de Vulnerabilidad</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_desc_vulnerabilidad" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_desc_vulnerabilidad">
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
                            <table id="table_desc_vulnerabilidad" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Vulnerabilidad</th>
                                        <th style="width: 120px;">Mantenimiento</th>
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
        <div class="row" >
        <div class="col-lg-12">
            <div class="opcion" id="apartMatriz" style="display:none">
                        <div class="card">
                            <div class="card-body">
                                    <div class="row">
                                        <!-- <div id="chart" class="col-lg-12"></div> -->
                                        <div class="col-lg-12">
                                            <h4>Matriz de Riesgos</h4>
                                        </div>
                                        <table style="border:1px solid #ccc" class="table_matriz" > 
                                    
                                        <tbody id="datos"></tbody>
                                            <!-- <tr>
                                                <td colspan='7'>Matriz de Riesgos</td>
                                                
                                            </tr>
                                            <div id="datos">

                                            </div> -->
                                        </table>
                                    </div>
                            </div>
                        </div>
            </div>
                        
        </div>
    </div>
    </div>

    <!-- MODAL CREATE TIPO RIESGO -->
    <div class="modal fade" id="modal_tipo_riesgo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-tipo_riesgo"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_tipo_riesgo" class="in-line">
                        <input type="hidden" id="id_tipo_riesgo">
                        <div class="col-12-lg">
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span>Riesgo: </span>
                                            <input type="text" class="form-control form-control-sm" id="input_tipo_riesgo">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span>Descripción: </span>
                                            <textarea type="text" class="form-control form-control-sm" id="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span>Estado: </span>
                                            <select name="" id="estado" class="form-control form-control-sm">
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
                    <button type="button" class="btn btn-primary" id="add_tipo_riego">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_tipo_riesgo">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR TIPO RIESGO -->
    <!-- MODAL CREATE PROBABILIDAD RIESGO ESCENARIO 1 -->
    <div class="modal fade" id="modal_probabilidad_riesgo_escenario_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_prob_riesgo_esc_1"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_probabilidad_riesgo_escenario_1" class="in-line">
                        <input type="hidden" id="id_probabilidad_riesgo">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Descripción: </span>
                                        <input required id="descripcion" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de regla: </span>
                                        <select required name="" id="tipo_regla" class="form-control form-control-sm">
                                            <option value="1 Valor">1 Valor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Valor: </span>
                                        <select required name="" id="tipo_valor" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="Numero">Número</option>
                                            <option value="Formula">Fórmula</option>
                                        </select>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Comentario: </span>
                                        <textarea required type="text" class="form-control form-control-sm" id="comentario"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 formula_1_probabilidad" style="display: none;">
                                    <div class="form-group" id="group_condicionales_formula">
                                        <div class="d-flex justify-content-between">
                                            <span>Formula: </span>
                                            <div class="col-md-3 pr-0 pl-3">
                                                <button type="button" class="form-control form-control-sm" id="btn_add_row_formula">+</button>
                                            </div>
                                        </div>
                                        <div class="row group_formula group_formula_1">
                                            <div class="col-md-3">
                                                <select id="operador_formula_1" class="form-control form-control-sm">
                                                    <option value="=">=</option>
                                                    <option value=">">></option>
                                                    <option value=">=">>=</option>
                                                    <option value="<"><</option>
                                                    <option value="<="><=</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" id="value_formula_1" class="form-control form-control-sm"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="resultado_formula_1" class="form-control form-control-sm"/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_probabilidad_riego_escenario_1">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_probabilidad_riego_escenario_1">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR PROBABILIDAD RIESGO 1 -->
    <!-- MODAL CREATE PROBABILIDAD RIESGO ESCENARIO 2 -->
    <div class="modal fade" id="modal_probabilidad_riesgo_escenario_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_prob_riesgo_esc_2"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_probabilidad_riesgo_escenario_2" class="in-line">
                        <input type="hidden" id="id_probabilidad_riesgo">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Descripción: </span>
                                        <input required id="descripcion" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de regla: </span>
                                        <select required name="" id="tipo_regla" class="form-control form-control-sm">
                                            <option value="2 Valores">2 Valores</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Valor: </span>
                                        <select required name="" id="tipo_valor" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="Numero">Número</option>
                                        </select>
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
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Operador 1: </span>
                                        <select required name="" id="operador_1" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Valor 1: </span>
                                        <input type="number" required id="valor_1" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Operador 2: </span>
                                        <select required name="" id="operador_2" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Valor 2: </span>
                                        <input type="number" id="valor_2" required class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Comentario: </span>
                                        <textarea required type="text" class="form-control form-control-sm" id="comentario"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_probabilidad_riego_escenario_2">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_probabilidad_riego_escenario_2">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR PROBABILIDAD RIESGO 2 -->

    <!-- MODAL CREATE IMPACTO RIESGO 1 -->
    <div class="modal fade" id="modal_impacto_riesgo_escenario_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_impacto_riesgo_esc_1"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_impacto_riesgo_escenario_1" class="in-line">
                        <input type="hidden" id="id_impacto_riesgo">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Descripción: </span>
                                        <input required id="descripcion" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de regla: </span>
                                        <select required name="" id="tipo_regla" class="form-control form-control-sm">
                                            <option value="1 Valor">1 Valor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Valor: </span>
                                        <select required name="" id="tipo_valor" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="Numero">Número</option>
                                            <option value="Formula">Fórmula</option>
                                        </select>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Comentario: </span>
                                        <textarea required type="text" class="form-control form-control-sm" id="comentario"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 formula_1_probabilidad" style="display: none;">
                                    <div class="form-group" id="group_condicionales_formula">
                                        <div class="d-flex justify-content-between">
                                            <span>Formula: </span>
                                            <div class="col-md-3 pr-0 pl-3">
                                                <button type="button" class="form-control form-control-sm" id="btn_add_row_formula">+</button>
                                            </div>
                                        </div>
                                        <div class="row group_formula group_formula_1">
                                            <div class="col-md-3">
                                                <select id="operador_formula_1" class="form-control form-control-sm">
                                                    <option value="=">=</option>
                                                    <option value=">">></option>
                                                    <option value=">=">>=</option>
                                                    <option value="<"><</option>
                                                    <option value="<="><=</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" id="value_formula_1" class="form-control form-control-sm"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="resultado_formula_1" class="form-control form-control-sm"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_impacto_riego_escenario_1">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_impacto_riego_escenario_1">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR IMPACTO RIESGO 1 -->
     <!-- MODAL CREATE IMPACTO RIESGO ESCENARIO 2 -->
     <div class="modal fade" id="modal_impacto_riesgo_escenario_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_impacto_riesgo_esc_2"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_impacto_riesgo_escenario_2" class="in-line">
                        <input type="hidden" id="id_impacto_riesgo">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Descripción: </span>
                                        <input required id="descripcion" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de regla: </span>
                                        <select required name="" id="tipo_regla" class="form-control form-control-sm">
                                            <option value="2 Valores">2 Valores</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Valor: </span>
                                        <select required name="" id="tipo_valor" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="Numero">Número</option>
                                        </select>
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
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Operador 1: </span>
                                        <select required name="" id="operador_1" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Valor 1: </span>
                                        <input type="number" required id="valor_1" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Operador 2: </span>
                                        <select required name="" id="operador_2" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <span>Valor 2: </span>
                                        <input type="number" id="valor_2" required class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Comentario: </span>
                                        <textarea required type="text" class="form-control form-control-sm" id="comentario"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_impacto_riego_escenario_2">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_impacto_riego_escenario_2">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR IMPACTO RIESGO 2 -->
    <!-- MODAL CREATE NIVEL RIESGO -->
    <div class="modal fade" id="modal_nivel_riesgo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_nivel_riesgo"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_nivel_riesgo" class="in-line">
                        <input type="hidden" id="id_nivel_riesgo">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Operador 1: </span>
                                        <select required name="" id="operador_1" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Valor 1: </span>
                                        <input type="number" class="form-control form-control-sm" id="valor_1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Operador 2: </span>
                                        <select required name="" id="operador_2" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Valor 2: </span>
                                        <input type="number" class="form-control form-control-sm" id="valor_2">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Color: </span>
                                        <input type="color" name="color" id="color" class="form-control form-control-sm">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Estado: </span>
                                        <select name="" id="estado" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Descripción: </span>
                                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Comentario: </span>
                                        <textarea name="comentario" id="comentario" class="form-control form-control-sm"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_nivel_riesgo">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_nivel_riesgo">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR NIVEL RIESGO -->
    <!-- MODAL CREATE TIPO AMENAZA -->
    <div class="modal fade" id="modal_tipo_amenaza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_tipo_amenaza"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_tipo_amenaza" class="in-line">
                        <input type="hidden" id="id_tipo_amenaza">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo: </span>
                                        <input type="text" class="form-control form-control-sm" id="tipo">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Estado: </span>
                                        <select name="" id="estado" class="form-control form-control-sm">
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
                    <button type="button" class="btn btn-primary" id="add_tipo_amenaza">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_tipo_amenaza">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR NIVEL RIESGO -->
    <!-- MODAL CREATE DESC AMENAZA -->
    <div class="modal fade" id="modal_desc_amenaza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_desc_amenaza"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_desc_amenaza" class="in-line">
                        <input type="hidden" id="id_desc_amenaza">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Tipo de Amenaza: </span>
                                        <select name="" id="id_tipo" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Amenaza: </span>
                                        <input type="text" class="form-control form-control-sm" id="amenaza">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_desc_amenaza">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_desc_amenaza">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR DESC RIESGO -->
    <!-- MODAL CREATE CATEGORIA VULNERABILIDAD -->
    <div class="modal fade" id="modal_categoria_vulnerabilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_categoria_vulnerabilidad"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_categoria_vulnerabilidad" class="in-line">
                        <input type="hidden" id="id_categoria_vulnerabilidad">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Categoria: </span>
                                        <input type="text" class="form-control form-control-sm" id="categoria">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Estado: </span>
                                        <select name="" id="estado" class="form-control form-control-sm">
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
                    <button type="button" class="btn btn-primary" id="add_categoria_vulnerabilidad">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_categoria_vulnerabilidad">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR DESC RIESGO -->
    <!-- MODAL CREATE DESC VULNERABILIDAD -->
    <div class="modal fade" id="modal_desc_vulnerabilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_desc_vulnerabilidad"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_desc_vulnerabilidad" class="in-line">
                        <input type="hidden" id="id_desc_vulnerabilidad">
                        <div class="col-12-lg">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Categoria de Vulnerabilidad: </span>
                                        <select name="" id="id_categoria_vulnerabilidad" class="form-control form-control-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Vulnerabilidad: </span>
                                        <input type="text" class="form-control form-control-sm" id="vulnerabilidad">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_desc_vulnerabilidad">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_desc_vulnerabilidad">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR DESC RIESGO -->

     <!-- MODAL CREATE DE VALORACION DE RIESGO-->
     <div class="modal fade" id="modal_ValoracionRiesgo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-ValoracionRiesgo"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_ValoracionRiesgo" class="in-line">
                        <input type="hidden" id="id_ValoracionRiesgo">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        
                                        <select name="" id="id_probabilidad" class="form-control form-control-sm">
                                            <option value="">Probabilidad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        
                                        <select name="" id="id_impacto" class="form-control form-control-sm">
                                            <option value="">impacto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                       
                                        <input type="text" placeholder="Valor" class="form-control form-control-sm" id="valor_valoracion">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="Agregar_ValoracionRiesgo">Agregar</button>
                    <button type="button" class="btn btn-primary" id="Modificar_ValoracionRiesgo">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var escenario = <?php echo json_encode($escenario); ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="<?=base_url('public/assets/js/riesgos/activos.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/tipo_riesgo.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/probabilidad_riesgo.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/impacto_riesgo.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/nivel_riesgo.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/tipo_amenaza.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/descripcion_amenaza.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/categoria_vulnerabilidad.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/descripcion_vulnerabilidad.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/riesgos/valoracion_riesgo.js'); ?>"></script>
<?=$this->endSection()?> 