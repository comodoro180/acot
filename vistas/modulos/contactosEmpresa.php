  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Contactos De Empresas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="empresas">Empresas</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarContactoEmpresa">
            Agregar Contacto Empresa
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nombre</th>                
                <th>Email</th>
                <th>Principal</th>
                <th>Empresa</th>
                <th>Estado</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $contactoEmpresa = ModeloContactosEmpresa::mdlMostrarContactosEmpresa(null, null);
                //var_dump($usuarios);
                foreach ($contactoEmpresa as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDEMPRESACONTACTOS"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["EMAIL"].'</td>                              
                          <td>'.$value["PRINCIPAL"].'</td>                              
                          <td>'.$value["EMPRESA"].'</td>
                          <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivarContactoEmpresa" idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'" estadoContactoEmpresa="0">Activo</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivarContactoEmpresa" idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'" estadoContactoEmpresa="1">Inactivo</button></td>';
                          }         
                    echo '</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarContactoEmpresa btn-xs" idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'" data-toggle="modal" data-target="#modalEditarContactoEmpresa"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarContactoEmpresa btn-xs" idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR CONTACTO EMPRESA -->  
  <div id="modalAgregarContactoEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Contacto de Empresa</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
              <label>Nombre:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="text" class="form-control input-lg" name="nuevoContactoEmpresa"  placeholder="Nombre del Contacto" required>                
                </div>
              </div>
              
              <label>E-mail:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-mail-forward"></i></span>                
                  <input type="email" class="form-control input-lg" name="nuevoEmail"  placeholder="Email" required>
                </div>
              </div>
              
              <label>Principal:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-mail-forward"></i></span>                
                  <input type="number" class="form-control input-lg" name="nuevoPrincipal"  placeholder="Principal" required>
                </div>
              </div>
              
              <label>Empresa:</label>
              <div class="form-group">
                  <select class="form-control input-lg" id="nuevoIdEmpresa" name="nuevoIdEmpresa" required>
                    <option value="">Seleccionar Empresa</option> 
                    <?php
                      $empresa = ModeloEmpresas::mdlMostrarEmpresas(null, null);
                      foreach ($empresa as $key => $value){
                        echo '<option value="'.$value["IDEMPRESA"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                  
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Contacto</button>
          </div>
    
          <?php
            $crearContactoEmpresa = new ControladorContactosEmpresa();
            $crearContactoEmpresa ->ctrCrearContactoEmpresa();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarContactoEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Contacto Empresa</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idEmpresaContactos" name="idEmpresaContactos">
              
              <label>Contacto:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="text" class="form-control input-lg" id="editarContactoEmpresa" name="editarContactoEmpresa" value="" placeholder="Nombre" >                
                </div>
              </div>

              <label>E-mail:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-mail-forward"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" placeholder="Email" >
                </div>
              </div>            
              
              <label>Principal:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-mail-forward"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarPrincipal" name="editarPrincipal" value="" placeholder="Principal" >
                </div>
              </div>            

              <label>Empresa:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-globe"></i></span>
                    <select class="form-control input-lg" name="editarIdEmpresa" required>
                      <option value="" id="editarIdEmpresa"></option> 
                      <?php
                        $empresa = ModeloEmpresas::mdlMostrarEmpresas(null , null);
                        $ultimaEmpresa = "";
                        foreach ($empresa as $key => $value){
                          $ultimaEmpresa = $empresas; 
                          $empresas = $value["EMPRESA"];
                          if ($empresas <> $ultimaEmpresa){
                              echo '<optgroup label="'.$empresas.'">';
                          } 
                          echo '<option value="'.$value["IDEMPRESA"].'">'.$value["NOMBRE"].'</option>';                                               
                        }
                      ?>
                    </select>
                  </div> 
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Contacto Empresa</button>
          </div>
  
        <?php

          $editarContactoEmpresa = new ControladorContactosEmpresa();
          $editarContactoEmpresa ->ctrEditarContactoEmpresa();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarContactoEmpresa = new ControladorContactosEmpresa();
  $borrarContactoEmpresa ->ctrBorrarContactoEmpresa();
  
 