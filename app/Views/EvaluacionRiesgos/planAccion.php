<?=$this->extend('Layout/main')?> 
<?=$this->section('content'); $session = session();?> 
        <div class="row">
                <div class="col-2">
                    <div class="card">
                        <div class="card-header" style="background:#fff;border-bottom: 2px solid #f1f5f7">
                                <div class="col-md-12 text-center">
                                    Registro de Plan de Acción
                                </div>
                           
                        </div>
                        <div class="card-body-center">
                            <div class="row align-items-center">
                                <ul class="menu">


                                <li id="registroPlanAccion" ><a href="#/RegistroPlanAccion" >Registro de plan de Acción</a></li>
                                    
                                    
                                  
                                </ul>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>



                
                <div class="col-lg-12">
                    <div  id="apartRegistroPlanAccion"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lista de Registros de Plan de Acción</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_planAccion" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_planAccion">
                                        
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
                                                <table id="table_planAccion" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>ID</th>                                                         
                                                            <th>Nombre del Plan de Acción</th>
                                                            <th>Nombre del Plan de Acción</th>                                                            
                                                            <th>Actividades</th>
                                                            <th>Responsable</th>
                                                            <th>Estado</th>
                                                            <th>Prioridad</th>
                                                            <th>Fecha Inicio</th>
                                                            <th>Fecha Fin</th>
                                                            <th>Detalles</th>                                                            
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
              <!-- modales para registro -->
                      <div class="modal fade" id="modal_planAccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      |   <div class="modal-dialog modal-lg" role="document">
                               <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="title-planAccion"></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="" id="form_planAccion" class="in-line">
                                          <input type="hidden" id="id_planAccion">
                                          
                                          <div class="col-12-lg">
                                              <div class="row">
                                                      
                                                    <div class="col-lg-2">
                                                          <div class="form-group">
                                                              <span>Riesgo Asiciado: </span>
                                                              <select name="" id="est_empresa" class="form-control form-control-sm">
                                                              <option value="">Seleccione</option>
                                                              <option value="1">Riesgo 1</option>
                                                              <option value="2">Riesgo 2</option>
                                                              </select>
                                                          </div>

                                                          
                                                    </div>
                                              
                                                    <div class="col-lg-5">
                                                          <div class="form-group">
                                                              <span>Control Asociado: </span>
                                                              <input type="text" class="form-control form-control-sm" id=""  onKeyPress="return soloLetra(event);">
                                                          </div>
                                                    </div>
                                            
                                                      
                                                    <div class="col-lg-5">
                                                          <div class="form-group">                                                             
                                                          <button type="button" class="btn btn-primary">Nuevo Control</button>     
                                                              
                                                          </div>   
                                                    </div>


                                                      <div class="col-lg-12">
                                                          <div class="form-group">                                                             
                                                              <span>Detalles del Plan</span>                                                              
                                                          </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                          <div class="form-group">                                                              
                                                              <input type="text" class="form-control form-control-sm" id="";">
                                                          </div>
                                                    </div>

                                                    <div class="col-lg-8">
                                                          <div class="form-group">
                                                              <span>Nombre del Plan de Acción: </span>
                                                              <input type="text" class="form-control form-control-sm" id=""  onKeyPress="return soloLetra(event);">
                                                          </div>
                                                    </div>

                                                    
                                                    <div class="col-lg-6">
                                                          <div class="form-group">
                                                              <span>Descripción del Plan: </span>
                                                              <input type="text" class="form-control form-control-sm" id=""  onKeyPress="return soloLetra(event);">
                                                          </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Fecha Inicio: </span>
                                                              <input type="date" class="form-control form-control-sm" id=""  onKeyPress="return soloLetra(event);">
                                                          </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Fecha Fin: </span>
                                                              <input type="date" class="form-control form-control-sm" id=""  onKeyPress="return soloLetra(event);">
                                                          </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                            <span>Empresa: </span>
                                                            <select name="" id="select_empresaPlan" class="form-control form-control-sm">
                                                        
                                                            </select>
                                                          </div>

                                                          
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Area: </span>
                                                              <select name="" id="select_areaPlan" class="form-control form-control-sm">
                                                        
                                                            </select>
                                                          </div>

                                                          
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Unidad: </span>
                                                              <select name="" id="select_unidadesPlan" class="form-control form-control-sm">
                                                        
                                                                </select>
                                                          </div>

                                                          
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Posicion: </span>
                                                              <select name="" id="est_empresa" class="form-control form-control-sm">
                                                              <option value="">Seleccione</option>
                                                              <option value="1">Posicion 1</option>
                                                              <option value="2">Posicion 2</option>
                                                              </select>
                                                          </div>

                                                          
                                                    </div>




                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Nombre: </span>
                                                              <select name="" id="est_empresa" class="form-control form-control-sm">
                                                              <option value="">Seleccione</option>
                                                              <option value="1">Nombre 1</option>
                                                              <option value="2">Nombre 2</option>
                                                              </select>
                                                          </div>

                                                          
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Prioridad: </span>
                                                              <select name="" id="est_empresa" class="form-control form-control-sm">
                                                              <option value="">Seleccione</option>
                                                              <option value="1">Prioridad 1</option>
                                                              <option value="2">Prioridad 2</option>
                                                              </select>
                                                          </div>

                                                          
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Estado: </span>
                                                              <select name="" id="est_empresa" class="form-control form-control-sm">
                                                              <option value="">Seleccione</option>
                                                              <option value="1">Estado 1</option>
                                                              <option value="2">Estado 2</option>
                                                              </select>
                                                          </div>

                                                          
                                                    </div>

                                                    <div class="col-lg-3">
                                                          <div class="form-group">
                                                              <span>Alerta Seguimiento: </span>
                                                              <select name="" id="est_empresa" class="form-control form-control-sm">
                                                              <option value="">Seleccione</option>
                                                              <option value="1">Alerta 1</option>
                                                              <option value="2">Alerta 2</option>
                                                              </select>
                                                          </div>

                                                          
                                                    </div>


                                                    <div class="col-lg-10">
                                                          <div class="form-group">                                                             
                                                              <span>Actividades</span>   
                                                              
                                                          </div>     
                                                          
                                                         
                                                         
                                                    </div>

                                                    <div class="col-lg-2">
                                                          <div class="form-group">                                                             
                                                          <button type="button" class="btn btn-primary">+ Agregar</button>     
                                                              
                                                          </div>   
                                                    </div>

                                                    
                                                      
                                              </div>
                                          </div>
                                      </form>  
                                      
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" id="Agregar_planAccion">Guardar</button>
                                      <button type="button" class="btn btn-primary" id="Modificar_planAccion">Guardar</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                  
                                  </div>
                              </div>
                          </div>
      
                      </div>





                     <!------------------------------------------------------------------------------->
                <script src="<?=base_url('public/assets/js/planesAccion/planesAccion.js'); ?>"></script>
                <script src="<?=base_url('public/assets/js/planesAccion/registrarPlan.js'); ?>"></script>  
        


<?=$this->endSection()?> 