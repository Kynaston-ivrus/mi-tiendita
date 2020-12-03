<?php
//Validamos si hay usuario en sesión
if( !isset($_SESSION['IdUsuario']) ){
  echo "<script>window.location.replace('index.php');</script>";
    exit;
}
?>
<!-- CSS -->
<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-3.3.7.min.css"> <!-- Este menú funciona con esa
  versión del Bootstrap -->
  <!-- JS -->
  <script src="js/jquery-3.4.0.min.js"></script>
  <script src="js/bootstrap-4.3.1.min.js"></script>

  <!-- Estilos propios para el menú de esta página, el cual es elmenú principal del
  sistema ------------>
  <style type="text/css">
  body {
    font-family: 'Open Sans', sans-serif;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    margin: 0;
    background-image: url(imagenes/bg.jpg);
  }
  .form-inline {
    display: inline-block;
  }
  .navbar-header.col {
    padding: 0 !important;
  }
  .navbar {
    font-size: 14px;
    background: #fff;
    padding-left: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #d6d6d6;
    box-shadow: 0 0 4px rgba(0,0,0,.1);
  }
  .navbar .navbar-brand {
    color: #555;
    padding-left: 0;
    font-size: 20px;
    padding-right: 50px;
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
  }
  .navbar .navbar-brand b {
    font-weight: bold;
    color: #f04f01;
  }
  .navbar ul.nav li {
    font-size: 96%;
    font-weight: bold;
    text-transform: uppercase;
  }
  .navbar ul.nav li.active a, .navbar ul.nav li.active a:hover, .navbar ul.nav li.active
  a:focus {
    color: #f04f01 !important;
    background: transparent !important;
  }
  .search-box {
    position: relative;
  }
  .search-box input.form-control, .search-box .btn {
    font-size: 14px;
    border-radius: 2px !important;
  }
  .search-box .input-group-btn {
    padding-left: 4px;
  }
  .search-box input.form-control:focus {
    border-color: #f04f01;
    box-shadow: 0 0 8px rgba(240,79,1,0.2);
  }
  .search-box .btn-primary, .search-box .btn-primary:active {
    font-weight: bold;
    background: #f04f01;

    border-color: #f04f01;
    text-transform: uppercase;
    min-width: 90px;
  }
  .search-box .btn-primary:focus {
    outline: none;
    background: #eb4e01;
    box-shadow: 0 0 8px rgba(240,79,1,0.2);
  }
  .search-box .btn span {
    transform: scale(0.9);
    display: inline-block;
  }
  .navbar .nav-item i {
    font-size: 18px;
  }
  .navbar .dropdown-item i {
    font-size: 16px;
    min-width: 22px;
  }
  .navbar .nav-item.open > a {
    background: none !important;
  }
  .navbar .dropdown-menu {
    border-radius: 1px;
    border-color: #e5e5e5;
    box-shadow: 0 2px 8px rgba(0,0,0,.05);
  }
  .navbar .dropdown-menu li a {
    color: #777;
    padding: 8px 20px;
    line-height: normal;
    font-size: 14px;
  }
  .navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:active {
    color: #333;
  }
  .navbar .navbar-form {
    border: none;
  }
  @media (min-width: 992px){
    .form-inline .input-group .form-control {
      width: 225px;
    }
  }
  @media (max-width: 992px){
    .form-inline {
      display: block;
    }
  }
</style>
</head>
<body>
  <nav class="navbar navbar-default navbar-expand-lg navbar-light">
    <div class="navbar-header d-flex col">
      <a class="navbar-brand" href="#">Mi <b>Tiendita</b></a>
      <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
      class="navbar-toggle navbar-toggler ml-auto">
      <span class="navbar-toggler-icon"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!--Acá comienza la configuración de los enlaces del menú del sistema ------>

  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
    <ul class="nav navbar-nav">
      <!-- Manú con sub menus ------->
      <li class="nav-item dropdown">
        <a data-toggle="dropdown" class="nav-link dropdown-toggle"
        href="#">Inventario <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?mod=prod&form=li" class="dropdown-
            item">Productos</a></li>
            <li><a href="index.php?mod=mrc&form=li" class="dropdown-item">Marcas</a></li>
            <li><a href="index.php?mod=cat&form=li" class="dropdown-
              item">Categorías</a></li>
            </ul>
          </li>
          <!--  menús sin sub menus ------------>
          <li class="nav-item"><a href="index.php?mod=clie&form=li" class="nav-link">Clientes</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Ventas</a></li>
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle"
            href="#">Sistema <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?mod=usua&form=li" class="dropdown-item">Usuarios y
                Empleados</a></li>
                <li><a href="#" class="dropdown-item">Mi
                  Cuenta</a></li>
                  <li><a href="#" onclick="javascript:CerrarSesion();"
                    class="dropdown-item">Cerrar Sesión</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Ayuda</a></li>
              </ul>
              <div class="navbar-form form-inline navbar-right ">
                <label>Bienvenido/a: <a href="#"><?php echo $_SESSION["NombreCompleto"];?></a></label>
              </div>
            </div>
          </nav>
          <script type="text/javascript">
          // ---------- Función para llamar al archivo de cerrar sesión ----------
          function CerrarSesion(){
            if( confirm('¿Confirma cerrar la sesión actual?') ){
              window.top.location.replace('logout.php');
            }
          }
          </script>
