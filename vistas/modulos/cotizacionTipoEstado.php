  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Tipos de Estado de Cotizaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Cotizaciones</a></li>
        <li class="active">Tipos de Estado</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCotizacionTipoEstado">
            Agregar Tipo de Estado de Cotización
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $tiposEstadoCotizacion = ModeloCotizacionTipoEstado::mdlMostrarCotizacionTipoEstado("tcotizaciontipoestado", null, null);
                //var_dump($usuarios);
                foreach ($tiposEstadoCotizacion as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDCOTIZACIONTIPOESTADO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarCotizacionTipoEstado btn-xs" idCotizacionTipoEstado="'.$value["IDCOTIZACIONTIPOESTADO"].'" data-toggle="modal" data-target="#modalEditarCotizacionTipoEstado"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarCotizacionTipoEstado btn-xs" idCotizacionTipoEstado="'.$value["IDCOTIZACIONTIPOESTADO"].'"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>                        
                    ';                    
                }
              ?>
 
            </tbody>
          </table>            

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  

  <!-- MODAL AGREGAR TIPO ESTADO COTIZACION-->  
  <div id="modalAgregarCotizacionTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Estado de Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre"  placeholder="Tipo de estado de cotización" required>                
                </div>
              </div> 
                
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>                               
                  <textarea class="form-control" rows="3" name="nuevaDescripcion"  placeholder="Descripción" required></textarea>                
                </div>
              </div>                    
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Tipo de Estado</button>
          </div>
    
          <?php
            $crearCotizacionTipoEstado = new ControladorCotizacionTipoEstado();
            $crearCotizacionTipoEstado ->ctrCrearCotizacionTipoEstado();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR TIPO ESTADO COTIZACION -->

  <!-- MODAL EDITAR TIPO ESTADO COTIZACION -->  
  <div id="modalEditarCotizacionTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Estado Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idCotizacionTipoEstado" name="idCotizacionTipoEstado">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" placeholder="Tipo de Estado de la Cotización" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <textarea class="form-control" rows="3" name="editarDescripcion" id="editarDescripcion" placeholder="Descripción" required></textarea>
                </div>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar Tipo de Estado</button>
          </div>
  
        <?php

          $editarCotizacionTipoEstado = new ControladorCotizacionTipoEstado();
          $editarCotizacionTipoEstado ->ctrEditarCotizacionTipoEstado();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR TIPO ESTADO COTIZACIÓN -->  
  
<?php

  $borrarCotizacionTipoEstado = new ControladorCotizacionTipoEstado();
  $borrarCotizacionTipoEstado ->ctrBorrarCotizacionTipoEstado();
  
?> 