  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de países        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Geografía</a></li>
        <li class="active">Países</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPais">
            Agregar país
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $paises = ModeloPaises::mdlMostrarPaises("tpais", null, null);
                //var_dump($usuarios);
                foreach ($paises as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDPAIS"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarPais btn-xs" idpais="'.$value["IDPAIS"].'" data-toggle="modal" data-target="#modalEditarPais"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarPais btn-xs" idpais="'.$value["IDPAIS"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR PAÍS -->  
  <div id="modalAgregarPais" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar país</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombrePais"  placeholder="País" required>                
                </div>
              </div>          
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar país</button>
          </div>
    
          <?php
            $crearUsuario = new ControladorPaises();
            $crearUsuario -> ctrCrearPais();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR PAÍS -->

  <!-- MODAL EDITAR PAÍS -->  
  <div id="modalEditarPais" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar país</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idpais" name="idpais">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombrePais" name="editarNombrePais" value="" placeholder="País" >                
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar país</button>
          </div>
  
        <?php

          $editarUsuario = new ControladorPaises();
          $editarUsuario -> ctrEditarPais();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR PAÍS -->  
  
<?php

  $borrarUsuario = new ControladorPaises();
  $borrarUsuario -> ctrBorrarPais();
  
?> 