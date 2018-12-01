  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Estados de Detalles de Cotizaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Cotizaciones</a></li>
        <li class="active">Estado del Detalle Cotización</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCotizacionDetalleTipoEstado">
            Agregar Estado
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $tipoDetalleEstadoCotizacion = ModeloCotizacionDetalleTipoEstado::mdlMostrarCotizacionDetalleTipoEstado('tcotizaciondetalletipoestado', null, null);
                //var_dump($usuarios);
                foreach ($tipoDetalleEstadoCotizacion as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDCOTIZACIONDETALLETIPOESTADO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarCotizacionDetalleTipoEstado btn-xs" idCotizacionDetalleTipoEstado="'.$value["IDCOTIZACIONDETALLETIPOESTADO"].'" data-toggle="modal" data-target="#modalEditarCotizacionDetalleTipoEstado"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarCotizacionDetalleTipoEstado btn-xs" idCotizacionDetalleTipoEstado="'.$value["IDCOTIZACIONDETALLETIPOESTADO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR TIPO ESTADO DETALLE COTIZACION-->  
  <div id="modalAgregarCotizacionDetalleTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Estado del Detalle de Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre"  placeholder="Estado del detalle de cotización" required>                
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
            <button type="submit" class="btn btn-primary" >Guardar Estado</button>
          </div>
    
          <?php
            $crearCotizacionDetalleTipoEstado = new ControladorCotizacionDetalleTipoEstado();
            $crearCotizacionDetalleTipoEstado ->ctrCrearCotizacionDetalleTipoEstado();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR TIPO ESTADO COTIZACION -->

  <!-- MODAL EDITAR TIPO ESTADO DETALLE COTIZACION -->  
  <div id="modalEditarCotizacionDetalleTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Estado del Detalle de Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

                <input type="hidden" id="idCotizacionDetalleTipoEstado" name="idCotizacionDetalleTipoEstado">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombreDetalle" name="editarNombreDetalle" value="" placeholder="Tipo de Estado de la Cotización" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <textarea class="form-control" rows="3" name="editarDescripcionDetalle" id="editarDescripcionDetalle" value="" placeholder="Descripción" required></textarea>
                </div>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar Estado</button>
          </div>
  
        <?php

          $editarCotizacionDetalleTipoEstado = new ControladorCotizacionDetalleTipoEstado();
          $editarCotizacionDetalleTipoEstado ->ctrEditarCotizacionDetalleTipoEstado();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR TIPO ESTADO DETALLE COTIZACIÓN -->  
  
<?php

  $borrarCotizacionDetalleTipoEstado = new ControladorCotizacionDetalleTipoEstado();
  $borrarCotizacionDetalleTipoEstado ->ctrBorrarCotizacionDetalleTipoEstado();
  
?> 