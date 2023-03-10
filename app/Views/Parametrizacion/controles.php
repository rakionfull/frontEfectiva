<?=$this->extend('Layout/main')?> 
<?=$this->section('content'); $session = session();?> 
        <div class="row">
                <div class="col-lg-4 ">
                    <div class="card">
                        <div class="card-header" style="background:#fff;border-bottom: 2px solid #f1f5f7">
                                <div class="col-md-12 text-center">
                                    Parametrizacón de Controles
                                </div>
                           
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <ul class="menu">
                                       
                                            <li id="Cobertura" ><a href="#/Cobertura" >Cobertura</a></li>
                                    
                                            <li id="Opcion" ><a href="#/Opcion_general" >Caracteristicas de Control</a></li>
                                            <div id="caja_caracteristica" class="">
                                                <!-- <li id="Disenio">
                                                    <div class="opciones">
                                                            <a href="#/Disenio">Diseño  </a>
                                                            <a href="" id="bajar_1" class="bajar"><i class=" fas fa-angle-down font-size-20"></i></a>
                                                            <a href="" id="subir_1" class="subir" style="display:none"><i class=" fas fa-angle-up font-size-20"></i></a>
                                                    </div>
                                                    <div id="caja_1" class="cajitas" style="display:none">
                                                        <a  id="Definicion" href="#/Definicion">Definición</a>
                                                        <a  id="Objetivo" href="#/Objetivo">Objetivo</a>
                                                        <a id="CalificacionDise" href="#/CalificacionDise">Calificacion de Diseño</a>
                                                        
                                                    </div>
                                                </li> 
                                                <li id="Operatividad">
                                                        <div class="opciones">
                                                            <a href="#/Operatividad">Operatividad  </a>
                                                            <a href="" id="bajar_2" class="bajar"><i class=" fas fa-angle-down font-size-20"></i></a>
                                                            <a href="" id="subir_2" class="subir" style="display:none"><i class=" fas fa-angle-up font-size-20"></i></a>
                                                        </div>
                                                        
                                                        <div id="caja_2" class="cajitas" style="display:none">
                                                            <a id="Prueba" href="#/Prueba">Prueba o revisión</a>
                                                            <a id="Automatizacion" href="#/Automatizacion">Automatización</a>
                                                            <a id="CalificacionOpera" href="#/CalificacionOpera">Calificacion de Operatividad</a>
                                                            <a id="CaracteristicaOpera" href="#/CaracteristicaOpera">Caracteristicas de Operatividad</a>
                                                        </div>
                                                        
                                                            
                                                        

                                                </li>  -->
                                            </div>
                                           
                                            <!-- <li id="Definicion"></li> 

                                            <li id="Objetivo"></li> 

                                            <li id="CalificacionDise"></li>  -->
                                      
                                           
                                               
                                           
                                            <li id="EvaluacionControl"><a href="#/EvaluacionControl">Evaluación de Control</a></li>
                                   
                                    
                                            <li id="aplicProba"><a href="#/AplicacionProbabilidad">Aplicación de la Probabilidad</a></li>
                                   
                                       
                                            <li id="aplicImpac"><a href="#/AplicacionImpacto" >Aplicación del Impacto</a></li>
  
                                  
                                </ul>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div  id="apartCobertura"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Cobertura</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Cobertura" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_cobertura">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_cobertura" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Cobertura</th>
                                                            <th>Descripción</th>
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
                    <!-- <div  id="apartCaractControl"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Caracteristica de Control</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_CaractControl" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_caractControl">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_caract_control" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
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

                    <div  id="apartDisenio"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Diseño</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Disenio" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Disenio">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Disenio" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Diseño</th>
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

                    <div  id="apartDefinicion"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Definición</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Definicion" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Definicion">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Definicion" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
                                                           
                                                            <th>Descripción</th>
                                                            <th>Peso</th>
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

                    <div  id="apartObjetivo"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Objetivo</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Objetivo" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Objetivo">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Objetivo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
                                                            <th>Descripción</th>
                                                            <th>Peso</th>
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

                    <div  id="apartCalificacionDise"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Calificación de Diseño</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_CalificacionDise" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_CalificacionDise">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_CalificacionDise" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Calificación</th>
                                                            <th>Descripción</th>
                                                            <th>Condición</th>
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

                    <div  id="apartOperatividad"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Operatividad</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Operatividad" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Operatividad">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Operatividad" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
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

                    <div  id="apartPrueba"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Prueba o revisión</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Prueba" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Prueba">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Prueba" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
                                                           
                                                            <th>Descripción</th>
                                                            <th>Peso</th>
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

                    <div  id="apartAutomatizacion"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Automatización</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Automatizacion" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Automatizacion">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Automatizacion" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
                                                           
                                                            <th>Descripción</th>
                                                            <th>Peso</th>
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

                    <div  id="apartCalificacionOpera"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Calificación de Operatividad</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_CalificacionOpera" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_CalificacionOpera">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_CalificacionOpera" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Calificación</th>
                                                            <th>Descripción</th>
                                                            <th>Condición</th>
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

                    <div  id="apartCaracteristicaOpera"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Caracteristica de Operatividad</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_CaracteristicaOpera" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_CaracteristicaOpera">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_CaracteristicaOpera" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Caracteristica</th>
                                                            <th>Descripción</th>
                                                          
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div> -->
                      <div  id="apartOpcion"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title" id="card-title-opcion"></h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Opcion" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_Opcion">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_Opcion" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Característica</th>
                                                            <th>Calificacion</th>
                                                            <th>valor</th>
                                                            <th>condicion</th>
                                                            <th>Peso</th>
                                                            <th>Descripción</th>
                                                            <th>tipo</th>
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
                    <div  id="apartEvaluacionControl"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Evaluacion de Control</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_EvaluacionControl" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_EvaluacionControl">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_EvaluacionControl" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>idDisenio</th>
                                                            <th>Diseño</th>
                                                            <th>idOperatividad</th>
                                                            <th>Operativiad</th>
                                                            <th>Calificacion</th>
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
                    <div  id="apartAplicacionProbabilidad"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Aplicacion de la Probabilidad</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_AplicacionProbabilidad" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_AplicacionProbabilidad">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_AplicacionProbabilidad" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>       
                                                            <th>idDisenio</th>                                                  
                                                            <th>Calificacion Total del Control</th>
                                                            <th>Posición</th>
                                                            <th>Descripcion</th>
                                                           
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
                    <div  id="apartAplicacionImpacto"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Aplicacion del Impacto</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_AplicacionImpacto" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_AplicacionImpacto">
                                        
                                    </div>
                                </div>
                
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_AplicacionImpacto" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>       
                                                            <th>idDisenio</th>                                                  
                                                            <th>Calificacion Total del Control</th>
                                                            <th>Posición</th>
                                                            <th>Descripcion</th>
                                                           
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
        <!-- modales de registro -->

         <div class="modal fade" id="modal_cobertura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-cobertura"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_cobertura" class="in-line">
                                    <input type="hidden" id="id_cobertura">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Cobertura' class="form-control form-control-sm" id="nom_cobertura"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_cobertura"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Cobertura">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Cobertura">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_caractControl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-caractControl"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_caractControl" class="in-line">
                                    <input type="hidden" id="id_caractControl">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_caract"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_caract"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_caract" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_CaractControl">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_CaractControl">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_Disenio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Disenio"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Disenio" class="in-line">
                                    <input type="hidden" id="id_Disenio">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_dise"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_dise"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_dise" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Disenio">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Disenio">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_Definicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Definicion"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Definicion" class="in-line">
                                    <input type="hidden" id="id_Definicion">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_defi"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_defi"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Peso' class="form-control form-control-sm" id="peso_defi">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_defi" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Definicion">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Definicion">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_Objetivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Objetivo"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Objetivo" class="in-line">
                                    <input type="hidden" id="id_Objetivo">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_obje"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_obje"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Peso' class="form-control form-control-sm" id="peso_obje">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_obje" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Objetivo">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Objetivo">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_CalificacionDise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-CalificacionDise"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_CalificacionDise" class="in-line">
                                    <input type="hidden" id="id_CalificacionDise">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Calificación' class="form-control form-control-sm" id="nom_calidise"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_calidise"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                 
                                                        <select name="" id="condi_calidise" class="form-control form-control-sm">
                                                        <option value="">Condición</option>
                                                        <option value="=">=</option>
                                                        <option value=">">></option>
                                                        <option value=">=">>=</option>
                                                        <option value="<"><</option>
                                                        <option value="<="><=</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Valor' class="form-control form-control-sm" id="valor_calidise">
                                                    </div>
                                                </div>
                                               
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_CalificacionDise">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_CalificacionDise">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_Operatividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Operatividad"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Operatividad" class="in-line">
                                    <input type="hidden" id="id_Operatividad">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_opera"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_opera"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_opera" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Operatividad">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Operatividad">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_Prueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Prueba"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Prueba" class="in-line">
                                    <input type="hidden" id="id_Prueba">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_prueba"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_prueba"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Peso' class="form-control form-control-sm" id="peso_prueba">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_prueba" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Prueba">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Prueba">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>
        <div class="modal fade" id="modal_Automatizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Automatizacion"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Automatizacion" class="in-line">
                                    <input type="hidden" id="id_Automatizacion">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_auto"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Peso' class="form-control form-control-sm" id="peso_auto">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_auto" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea name="" cols="30" rows="5"  placeholder='Descripción' class="form-control form-control-sm" id="desc_auto"  onKeyPress="return soloLetra(event)";></textarea>
                                                        
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Automatizacion">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Automatizacion">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_CalificacionOpera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-CalificacionOpera"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_CalificacionOpera" class="in-line">
                                    <input type="hidden" id="id_CalificacionOpera">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Calificación' class="form-control form-control-sm" id="nom_caliopera"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Descripción' class="form-control form-control-sm" id="desc_caliopera"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                 
                                                        <select name="" id="condi_caliopera" class="form-control form-control-sm">
                                                        <option value="">Condición</option>
                                                        <option value="=">=</option>
                                                        <option value=">">></option>
                                                        <option value=">=">>=</option>
                                                        <option value="<"><</option>
                                                        <option value="<="><=</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Valor' class="form-control form-control-sm" id="valor_caliopera">
                                                    </div>
                                                </div>
                                               
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_CalificacionOpera">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_CalificacionOpera">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_CaracteristicaOpera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-CaracteristicaOpera"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_CaracteristicaOpera" class="in-line">
                                    <input type="hidden" id="id_CaracteristicaOpera">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Caracteristica' class="form-control form-control-sm" id="nom_caractopera"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea  cols="30" rows="5" placeholder='Descripción' class="form-control form-control-sm" id="desc_caractopera"  onKeyPress="return soloLetra(event);" ></textarea>
                                                        
                                                    </div>
                                                </div>
                                               
                                               
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_CaracteristicaOpera">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_CaracteristicaOpera">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>

        <div class="modal fade" id="modal_Opcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-Opcion"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_Opcion" class="in-line">
                                    <input type="hidden" id="id_Opcion">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control form-control-sm" id="nom_opcion"  onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="apartcali_opcion">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="cali_opcion">
                                                            <label class="form-check-label" for="exampleCheck1">Calificacon</label>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6" id="apartcali2_opcion">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="cali2_opcion">
                                                            <label class="form-check-label" for="exampleCheck1">Es Calificacon</label>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6" id="apartCheckTabla_opcion">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="check_tabla_opcion">
                                                            <label class="form-check-label" for="exampleCheck1">Es Tabla</label>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6" id="aparNomTabla_opcion">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="nom_tabla" class="form-control form-control-sm">
                                                        <option value="">Selecciona Tabla</option>
                                                        <option value="1">Usuarios</option>
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="apartpeso_opcion">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Peso' class="form-control form-control-sm" id="peso_opcion">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="apartvalor_opcion">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Valor' class="form-control form-control-sm" id="valor_opcion">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6" id="apartest_opcion">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="est_opcion" class="form-control form-control-sm">
                                                        <option value="">Estado</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="apartcondi_opcion">
                                                    <div class="form-group">
                                                 
                                                        <select name="" id="condi_opcion" class="form-control form-control-sm">
                                                        <option value="">Condición</option>
                                                        <option value="=">=</option>
                                                        <option value=">">></option>
                                                        <option value=">=">>=</option>
                                                        <option value="<"><</option>
                                                        <option value="<="><=</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea  cols="30" rows="3" placeholder='Descripción' class="form-control form-control-sm" id="desc_opcion"  onKeyPress="return soloLetra(event);" ></textarea>
                                                        
                                                    </div>
                                                </div>
                                                
                                              
                                               
                                                
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Opcion">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Opcion">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>
        <div class="modal fade" id="modal_EvaluacionControl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-EvaluacionControl"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_EvaluacionControl" class="in-line">
                                    <input type="hidden" id="id_EvaluacionControl">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="disenio_eva" class="form-control form-control-sm">
                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="operatividad_eva" class="form-control form-control-sm">
                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Calificacion' class="form-control form-control-sm" id="cali_eva">
                                                    </div>
                                                </div>
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_EvaluacionControl">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_EvaluacionControl">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>
        <div class="modal fade" id="modal_AplicacionProbabilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-AplicacionProbabilidad"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_AplicacionProbabilidad" class="in-line">
                                    <input type="hidden" id="id_AplicacionProbabilidad">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="escenario_proba" class="form-control form-control-sm">
                                                            <option value="">Escenario</option>
                                                            <option value="1">Escenario 1</option>
                                                            <option value="2">Escenario 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="disenio_proba" class="form-control form-control-sm">
                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Posicion' class="form-control form-control-sm" id="posicion_proba">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Desccripcion' class="form-control form-control-sm" id="desc_proba">
                                                    </div>
                                                </div>
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_AplicacionProbabilidad">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_AplicacionProbabilidad">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>
         <div class="modal fade" id="modal_AplicacionImpacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-AplicacionImpacto"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_AplicacionImpacto" class="in-line">
                                    <input type="hidden" id="id_AplicacionImpacto">
                                    
                                   
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="escenario_impac" class="form-control form-control-sm">
                                                            <option value="">Escenario</option>
                                                            <option value="1">Escenario 1</option>
                                                            <option value="2">Escenario 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       
                                                        <select name="" id="disenio_impac" class="form-control form-control-sm">
                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Posicion' class="form-control form-control-sm" id="posicion_impac">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder='Desccripcion' class="form-control form-control-sm" id="desc_impac">
                                                    </div>
                                                </div>
                                        </div>
                                    
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_AplicacionImpacto">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_AplicacionImpacto">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

        </div>
        <script src="<?=base_url('public/assets/js/controles/controles.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/controles/cobertura.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/controles/opcion.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/controles/EvaluacionControl.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/controles/aplicacionProbabilidad.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/controles/aplicacionImpacto.js'); ?>"></script>
       
<?=$this->endSection()?> 
