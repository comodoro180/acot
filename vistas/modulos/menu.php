<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">        
<!--INICIO-->     
        <li class="active">
          <a href="inicio">
            <i class="fa fa-home"></i>
            <span>inicio</span>
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
              <a href="registrar_cotizacion">
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
                    <a href="usuarios">
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
                //Productos
                $_GET["ruta"] == "tipoProducto"||
                $_GET["ruta"] == "productos"
                    ) {                
                echo '<li class="treeview active">';
            } else {
                echo '<li class="treeview">';
            }
        ?>
<!--        <li class="treeview" id="menuAdmin">-->
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
<!--                <li class="treeview">-->
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Geografía</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>

                            <a href="paises" id="a_paises">
                              <i class="fa fa-circle-o"></i>
                              <span>Países</span>
                            </a>
                        </li>
                        <li>
                            <a href="departamentos">
                              <i class="fa fa-circle-o"></i>
                              <span>Departamentos</span>
                            </a>
                        </li>
                        <li>
                            <a href="ciudades">
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
<!--                <li class="treeview">-->
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Usuarios</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="usuarios">
                              <i class="fa fa-users"></i>
                              <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Usuarios por empresa</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Usuarios por proveedor</span>
                            </a>
                        </li>
                        <li>
                            <a href="roles">
                              <i class="fa fa-circle-o"></i>
                              <span>Roles</span>
                            </a>
                        </li>                        
                    </ul>
                </li>
             <!--ADMISNISTRACIÃ“N - EMPRESAS--> 
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
                            <a href="empresas">
                              <i class="fa fa-circle-o"></i>
                              <span>Empresas</span>
                            </a>
                        </li>
                        <li>
                            <a href="contactosEmpresa">
                              <i class="fa fa-circle-o"></i>
                              <span>Contactos por empresa</span>
                            </a>
                        </li>
                    </ul>
                </li>
             <!--ADMISNISTRACIÓN - PROVEEDORES-->  
             
                <?php
                    if ($_GET["ruta"] == "proveedores") {                
                        echo '<li class="treeview active">';
                    } else {
                        echo '<li class="treeview">';
                    }
                ?>
             
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Proveedores</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>          
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="proveedores">
                              <i class="fa fa-users"></i>
                              <span>Proveedores</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Contactos por proveedor</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                              <i class="fa fa-circle-o"></i>
                              <span>Cotizaciones por proveedor</span>
                            </a>
                        </li>
                    </ul>
                </li>  
             <!--ADMISNISTRACIÓN - PRODUCTOS-->
                <?php
                    if ($_GET["ruta"] == "tipoProducto" ||
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
                            <a href="tipoProducto">
                              <i class="fa fa-circle-o"></i>
                              <span>Tipos de producto</span>
                            </a>
                        </li>
                        <li>
                            <a href="productos">
                              <i class="fa fa-circle-o"></i>
                              <span>Productos</span>
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
             <!--ADMISNISTRACIÓN - PEDIDOS-->                  
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Pedidos</span>
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
                <!--ADMISNISTRACIÓN - COTIZACIONES-->                  
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-list-ul"></i>
                        <span>Cotizaciones</span>
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
                <!--ADMISNISTRACIÓN - ...-->                
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

    </ul>
  </section>
</aside>


