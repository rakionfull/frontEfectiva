<?=$this->extend('Layout/main')?> 
<?=$this->section('content')?>
    <!-- <link rel="stylesheet" href="<?=base_url('public/assets/css/riesgos/styles.css'); ?>"> -->
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header" style="background:#fff;border-bottom: 2px solid #f1f5f7">
                        <div class="col-md-12 text-center">
                            Parametrizacón de Controles
                        </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <ul class="menu">
                            <li id="cobertura" ><a href="#/Cobertura" >Cobertura</a></li>
                            <li id="caracteristica_control" ><a href="#/CaracteristicaControl" >Caracteristica de Control</a></li>
                            <li id="disenio"><a href="#/Disenio">Diseño</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
        <div id="apartCaracteristicaControl" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Caracteristicas de Control</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_caracteristica_control" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_caracteristica_control">
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
                            <table id="table_caracteristica_control" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Caracteristica</th>
                                        <th>Descripcion</th>
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
        <div id="apartDisenio" class="opcion" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="card-title">Lista de Diseño</h4>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <button type="button" id="btn_add_disenio" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                            </div>
                            <div class="col-12" style="margin-top:0.5rem" id="alerta_disenio">
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
                            <table id="table_disenio" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>                                                         
                                        <th>Caracteristica</th>
                                        <th>Descripcion</th>
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
    <!-- MODAL CREATE CARACTERISTICA CONTROL -->
    <div class="modal fade" id="modal_caracteristica_control" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_caracteristica_control"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_caracteristica_control" class="in-line">
                        <input type="hidden" id="id_caracteristica_control">
                        <div class="col-12-lg">
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span>Caracteristica: </span>
                                            <input type="text" class="form-control form-control-sm" id="caracteristica">
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
                    <button type="button" class="btn btn-primary" id="add_caracteristica_control">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_caracteristica_control">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR CARACTERISTICA CONTROL -->
    <!-- MODAL CREATE DISEÑO -->
    <div class="modal fade" id="modal_disenio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_disenio"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="form_disenio" class="in-line">
                        <input type="hidden" id="id_disenio">
                        <div class="col-12-lg">
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span>Caracteristica: </span>
                                            <input type="text" class="form-control form-control-sm" id="caracteristica">
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
                    <button type="button" class="btn btn-primary" id="add_disenio">Agregar</button>
                    <button type="button" class="btn btn-primary" id="update_disenio">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CREAR DISEÑO -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="<?=base_url('public/assets/js/controles/activos.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/controles/caracteristica_control.js'); ?>"></script>
    <script src="<?=base_url('public/assets/js/controles/disenio.js'); ?>"></script>
<?=$this->endSection()?>