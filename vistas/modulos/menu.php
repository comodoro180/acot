<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">        
<!--INICIO-->     
        <li class="active">
          <a href="inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>
<!--COTIZACIONES-->
        <li class="treeview">
          <a href="">
            <i class="fa fa-calculator"></i>
            <span>Cotizaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>          
          </a>
          <ul class="treeview-menu">     
            <li>
              <a href="registrarCotizacion">
                <i class="fa fa-circle-o"></i>
                <span>Registrar cotización</span>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-circle-o"></i>
                <span>Mis cotizaciones</span>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-circle-o"></i>
                <span>Cotizaciones de la empresa</span>
              </a>
            </li>
          </ul>
        </li>
<!--PEDIDOS-->        
        <li class="treeview">
            <a href="">
                <i class="fa fa-clipboard"></i>
                <span>Pedidos</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>          
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="registrarPedido">
                      <i class="fa fa-circle-o"></i>
                      <span>Registrar pedido</span>
                    </a>
                </li>
                <li>
                    <a href="">
                      <i class="fa fa-circle-o"></i>
                      <span>Pedidos cotizados</span>
                    </a>
                </li>
                <li>
                    <a href="">
                      <i class="fa fa-circle-o"></i>
                      <span>Pedidos pendientes</span>
                    </a>
                </li>                 
                <li>
                    <a href="">
                      <i class="fa fa-circle-o"></i>
                      <span>Crear orden de serivicio</span>
                    </a>
                </li>               
            </ul>
        </li> 
<!--ADMISNISTRACIÓN-->  
        <?php
            if (//Geografía
                $_GET["ruta"] == "paises" || 
                $_GET["ruta"] == "departamentos" ||
                $_GET["ruta"] == "ciudades" ||
                //Usuarios    
                $_GET["ruta"] == "roles" ||
                $_GET["ruta"] == "usuarios"||
                //Empresas    
                $_GET["ruta"] == "empresas" ||
                $_GET["ruta"] == "contactosEmpresa" ||
                //Proveedores    
                $_GET["ruta"] == "proveedores" ||
                $_GET["ruta"] == "contactosProveedor" ||
                //Productos
                $_GET["ruta"] == "tipoProducto"||
                $_GET["ruta"] == "productos"||
                $_GET["ruta"] == "proveedorProductos"||
                $_GET["ruta"] == "proveedorTipoProducto"||
                //Pedidos                    
                $_GET["ruta"] == "pedidos"||
                $_GET["ruta"] == "pedidoDetalle"||
                $_GET["ruta"] == "pedidoTipoEstado"||
                //Cotizaciones
                $_GET["ruta"] == "cotizaciones"||
                $_GET["ruta"] == "cotizacionTipoEstado"||
                $_GET["ruta"] == "cotizacionDetalleTipoEstado"
                    ) {                
                echo '<li class="treeview active">';
            } else {
                echo '<li class="treeview">';
            }
        ?>
            <a href="" >
                <i class="fa fa-cogs"></i>
                <span>Administración</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>          
            </a>
            <ul class="treeview-menu">
<!--ADMISNISTRACIÓN - GEOGRAFÍA--> 
                <?php
                    if ($_GET["ruta"] == "paises" || 
                        $_GET["ruta"] == "departamentos" ||
                        $_GET["ruta"] == "ciudades") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>             
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Geografía</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="paises" <?php if ($_GET["ruta"] == "paises") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Países</span>
                            </a>
                        </li>
                        <li>
                            <a href="departamentos" <?php if ($_GET["ruta"] == "departamentos") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Departamentos</span>
                            </a>
                        </li>
                        <li>
                            <a href="ciudades" <?php if ($_GET["ruta"] == "ciudades") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Ciudades</span>
                            </a>
                        </li>
                    </ul>
                </li>
<!--ADMISNISTRACIÓN - USUARIOS-->
                <?php
                    if ($_GET["ruta"] == "usuarios" ||
                        $_GET["ruta"] == "roles") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>               
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Usuarios</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="usuarios" <?php if ($_GET["ruta"] == "usuarios") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-users"></i>
                              <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="usuariosEmpresa" <?php if ($_GET["ruta"] == "usuariosEmpresa") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Usuarios por empresa</span>
                            </a>
                        </li>
                        <li>
                            <a href="usuariosProveedor" <?php if ($_GET["ruta"] == "usuariosProveedor") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Usuarios por proveedor</span>
                            </a>
                        </li>
                        <li>
                            <a href="roles" <?php if ($_GET["ruta"] == "roles") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Roles</span>
                            </a>
                        </li>                        
                    </ul>
                </li>
<!--ADMISNISTRACIÓN - EMPRESAS--> 
                <?php
                    if ($_GET["ruta"] == "empresas" ||
                        $_GET["ruta"] == "contactosEmpresa") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Empresas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="empresas" <?php if ($_GET["ruta"] == "empresas") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Empresas</span>
                            </a>
                        </li>
                        <li>
                            <a href="contactosEmpresa" <?php if ($_GET["ruta"] == "contactosEmpresa") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Contactos empresa</span>
                            </a>
                        </li>
                    </ul>
                </li>
<!--ADMISNISTRACIÓN - PROVEEDORES-->  
             
                <?php
                    if ($_GET["ruta"] == "proveedores"||
                        $_GET["ruta"] == "contactosProveedor") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Proveedores</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="proveedores" <?php if ($_GET["ruta"] == "proveedores") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Proveedores</span>
                            </a>
                        </li>
                        <li>
                            <a href="contactosProveedor" <?php if ($_GET["ruta"] == "contactosProveedor") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Contactos</span>
                            </a>
                        </li>
                        <li>
                            <a href="cotizacionesProveedor" <?php if ($_GET["ruta"] == "cotizacionesProveedor") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Cotizaciones</span>                              
                            </a>
                        </li>
                    </ul>
                </li>  
<!--ADMISNISTRACIÓN - PRODUCTOS-->
            
                <?php
                    if ($_GET["ruta"] == "tipoProducto" ||
                        $_GET["ruta"] == "proveedorProductos"||
                        $_GET["ruta"] == "proveedorTipoProducto"||
                        $_GET["ruta"] == "productos") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>             
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Productos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="tipoProducto" <?php if ($_GET["ruta"] == "tipoProducto") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Tipos de producto</span>
                            </a>
                        </li>
                        <li>
                            <a href="productos" <?php if ($_GET["ruta"] == "productos") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Productos</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="proveedorProductos" <?php if ($_GET["ruta"] == "proveedorProductos") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Proveedores Productos</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="proveedorTipoProducto" <?php if ($_GET["ruta"] == "proveedorTipoProducto") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Proveedores Tipo Productos</span>
                            </a>
                        </li>
                        
                    </ul>
                </li> 
<!--ADMISNISTRACIÓN - PEDIDOS-->    

                <?php
                    if ($_GET["ruta"] == "pedidos" ||
                        $_GET["ruta"] == "pedidoDetalle"){                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>             
<!--                <li class="treeview">-->
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Pedidos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="pedidos" <?php if ($_GET["ruta"] == "pedidos") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Pedidos</span>
                            </a>
                        </li>
                        <li>
                            <a href="pedidoDetalle" <?php if ($_GET["ruta"] == "pedidoDetalle") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Detalle Pedidos</span>
                            </a>
                        </li>
                        <!--
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Menu 1.2</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Menu 1.3</span>
                            </a>
                        </li>
                        -->
                    </ul>
                </li> 
<!--ADMISNISTRACIÓN - COTIZACIONES-->  

                <?php
                    if ($_GET["ruta"] == "cotizaciones" ||
                        $_GET["ruta"] == "cotizacionTipoEstado"||
                        $_GET["ruta"] == "cotizacionDetalleTipoEstado") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>

                
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Cotizaciones</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="cotizaciones" <?php if ($_GET["ruta"] == "cotizaciones") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Cotizaciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="cotizacionTipoEstado" <?php if ($_GET["ruta"] == "cotizacionTipoEstado") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Estado de Cotizaciones</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="cotizacionDetalleTipoEstado" <?php if ($_GET["ruta"] == "cotizacionDetalleTipoEstado") echo 'class="AcotMenuSeleccionado"'; ?>>
                              <i class="fa fa-circle-o"></i>
                              <span>Estado Detalle Cotizaciones</span>
                            </a>
                        </li>
                        <!--
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Menu 1.2</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Menu 1.3</span>
                            </a>
                        </li>
                        -->
                    </ul>
                </li> 
<!--ADMISNISTRACIÓN - ...--> 
    <!--   
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Menu 2</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="usuarios">
                              <i class="fa fa-users"></i>
                              <span>Menu 1.1</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Menu 1.2</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Menu 1.3</span>
                            </a>
                        </li>
                    </ul>
                </li>               
            </ul>
        </li>     

        <li class="treeview">
            <a href="">
                <i class="fa fa-list-ul"></i>
                <span>Menu 1</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>          
            </a>

            <ul class="treeview-menu">
                <li>
                    <a href="usuarios">
                      <i class="fa fa-users"></i>
                      <span>Menu 1.1</span>
                    </a>
                </li>
                <li>
                    <a href="">
                      <i class="fa fa-circle-o"></i>
                      <span>Menu 1.2</span>
                    </a>
                </li>
                <li>
                    <a href="">
                      <i class="fa fa-circle-o"></i>
                      <span>Menu 1.3</span>
                    </a>
                </li>
            </ul>
        </li>        
    -->
    </ul>
  </section>
</aside>


