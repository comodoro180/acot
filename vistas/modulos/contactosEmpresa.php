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
                $contactoEmpresa = ModeloContactosEmpresa::mdlMostrarContactosEmpresa('tempresacontactos',null, null);
                //var_dump($usuarios);
                foreach ($contactoEmpresa as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDEMPRESACONTACTOS"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["EMAIL"].'</td>                              
                          <td>';
                          if ($value["PRINCIPAL"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnPrincipal" idPrincipal="'.$value["IDEMPRESACONTACTOS"].'" principal="0">Contacto Principal</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnPrincipal" idPrincipal="'.$value["IDEMPRESACONTACTOS"].'" principal="1">No Contacto Principal</button></td>';
                          }         
                    echo '</td>
                          <td>'.$value["EMPRESA"].'</td>
                          <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivarContactoEmpresa "idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'" estadoContactoEmpresa="0">Activo</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivarContactoEmpresa"idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'" estadoContactoEmpresa="1">Inactivo</button></td>';
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
                  <span class="input-group-addon"> <i class="fa fa-address-card"></i></span>                                    
                  <input type="text" class="form-control input-lg" name="nuevoContactoEmpresa" id="nuevoContactoEmpresa" placeholder="Nombre del Contacto" required>                
                </div>
              </div>
              
              <label>Email:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-group"></i></span>
                  <select class="form-control input-lg" name="nuevoEmailCE" id="nuevoEmailCE" required>
                      <option value="" id="nuevoEmailCE">Seleccione el correo Electronico</option> 
                      <?php
                            $persona = ModeloUsuarios::mdlMostrarUsuarios('tusuario',null, null);
                            foreach ($persona as $key => $value){
                              echo '<option value="'.$value["EMAIL"].'">'.$value["EMAIL"].'</option>';
                            }
                          ?> 
                   </select>
                  </div> 
              </div>
              
              <label>Empresa:</label>
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-group"></i></span>
                        <select class="form-control input-lg" id="nuevoIdEmpresa" name="nuevoIdEmpresa" required>
                          <option value="">Seleccionar Empresa</option> 
                          <?php
                            $empresa = ModeloEmpresas::mdlMostrarEmpresas('tempresa', null, null);
                            foreach ($empresa as $key => $value){
                              echo '<option value="'.$value["IDEMPRESA"].'">'.$value["NOMBRE"].'</option>';
                            }
                          ?>
                        </select>                  
                  </div> 
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <input type="hidden" name="nuevoPrincipal"  placeholder="Principal" value="0">
                  <input type="checkbox" name="nuevoPrincipal"  placeholder="Principal" value="1"> Contacto Principal
                </div>
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
                  <span class="input-group-addon"> <i class="fa fa-address-card"></i></span>
                  <input type="text" class="form-control input-lg" id="editarContactoEmpresa" name="editarContactoEmpresa" value="" placeholder="Nombre" >                
                </div>
              </div>

              <label>Email:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-group"></i></span>
                  <select class="form-control input-lg" name="editarEmailCE" id="editarEmailCEM" >
                      <option value="" id="editarEmailCE"></option> 
                      <?php
                            $persona = ModeloUsuarios::mdlMostrarUsuarios('tusuario',null, null);
                            foreach ($persona as $key => $value){
                              echo '<option value="'.$value["EMAIL"].'">'.$value["EMAIL"].'</option>';
                            }
                          ?> 
                   </select>
                  </div> 
              </div>             
              
              <label>Empresa:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-group"></i></span>
                    <select class="form-control input-lg" name="editarIdEmpresaContactoEmpresa" required>
                      <option value="" id="editarIdEmpresaContactoEmpresa"></option> 
                      <?php
                            $empresa = ModeloEmpresas::mdlMostrarEmpresas('tempresa',null, null);
                            foreach ($empresa as $key => $value){
                              echo '<option value="'.$value["IDEMPRESA"].'">'.$value["NOMBRE"].'</option>';
                            }
                          ?> 
                   </select>
                  </div> 
              </div> 
              <div class="form-group">
                <div class="input-group">
                    <input type="checkbox" name="editarPrincipal" id="editarPrincipal" value="1"> Contacto Principal
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
  
 