<?php session_start();
    include_once "php/base.php"; isPantalla();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="img/Logo.ico">
    <link rel="shortcut icon" href="img/webImage/Logo.ico" type="image/x-icon">    <title>Inicio</title>
    <!-- FONTAWESOME LIBRARY -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- BOOTSTRAP LIBRARY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/indexStyle.css">
</head>
<body>
    <!-- PRELOADER PREGUNTAR COMO REALIZAR UN EFECTO FADEOUT EN JAVASCRIPT --> 
    <div class="preloader">
        <div class="cssload-loader"></div>
    </div>

    <!-- ==================== MENÚ ==================== -->
    <!-- <div> -->

        <nav id="menu" class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid ">
                <a class="navbar-brand" href="inicio">
                    <!-- LOGO -->
                    <img src="img/webImage/logoazul.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top">
                    CPIFP Bajo Aragon
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- ICONO VERSIÓN MOVIL -->
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                <ul id="menu2" class="navbar-nav">
                    <li class="nav-item"> <!-- NUEVO USUARIO -->
                        <a class="nav-link" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#usuario"><!-- LLAMARA AL MODAL DE USUARIO -->
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            Nuevo Usuario
                        </a>
                    </li>
                    <li class="nav-item"> <!-- NUEVA PUBLICACIÓN -->
                        <a class="nav-link" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#publicacion"><!-- LLAMARA AL MODAL DE PUBLICACIÓN -->
                            <i class="fa-solid fa-file-pen"></i> 
                            Nueva Publicación
                        </a>
                    </li>
                    <li class="nav-item"> <!-- NUEVA PANTALLA -->
                        <a class="nav-link" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#pantalla"><!-- LLAMARA AL MODAL DE PUBLICACIÓN -->
                            <i class="fa-solid fa-desktop"></i>
                            Nueva Pantalla
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"> <!-- INICIAR SESIÓN -->
                        <a class="nav-link active" aria-current="page" href="login">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            Ingresar
                        </a>
                    </li>
                    <li class="nav-item">  <!-- CERRAR SESIÓN -->
                        <a class="nav-link active" aria-current="page" href="php/cerrar.php">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
                </div>
            </div> 
        </nav>
        <!-- ==================== FIN DEL MENÚ ==================== -->

        <!-- ==================== CONTENIDO DE LA WEB ==================== -->
        <h1 class="text-center m-3">Bienvenidos somos el grupo Midgard</h1>
        <!--  -->
        <section class="container">
            <h2 class="text-center"><strong>Submenu</strong> de Navegación</h2>

            <!-- ==================== ROL =================== -->
            
          
    
            <!-- ==================== FIN ROL =================== -->
            
            <!-- SUBMENU MIDGARD -->
            <div class="row">

                <!-- MI PERFIL -->
                <div class="col-sm-12 col-md-6 col-lg-4 capa"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div class="icono_submenu text-center" style="background-color:rgba(245, 40, 23, 0.1)";>
                                <i class="fa fa-user" style="color:#CD2222"></i>
                            </div>
                            <div class="texto_submenu">
                                <h3>Mi Perfil</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- MIS PUBLICACIONES -->
                <div class="col-sm-12 col-md-6 col-lg-4 capa"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="mensajes"> <!-- Colocar el link a la pagina de la vista -->
                            <div class="icono_submenu text-center" style="background-color:rgba(102, 0, 102, 0.1)">
                                <i class="fa-solid fa-newspaper" style="color:#990099"></i>
                            </div>
                            <div class="texto_submenu">
                                <h3>Mis Publicaciones</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- LISTAR USUARIOS -->
                <div class="col-sm-12 col-md-6 col-lg-4 capa"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="usuarios"> <!-- Colocar el link a la pagina de la vista -->
                            <div class="icono_submenu text-center" style="background-color:rgba(187, 120, 36, 0.1)">
                                <i class="fa fa-users" style="color:#BB7824"></i>
                            </div>
                            <div class="texto_submenu">
                                <h3>Lista de Usuarios</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- LISTA DE PUBLICACIONES -->
                <div class="col-sm-12 col-md-6 col-lg-4 capa"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="publicaciones"><!-- Colocar el link a la pagina de la vista -->
                            <div class="icono_submenu text-center" style="background-color:  rgba(51, 105, 232, 0.1)">
                            <i class="fa-solid fa-list"style="color:#3369e8"></i>
                            </div>
                            <div class="texto_submenu">
                                <h3>Lista Publicaciones</h3> <!-- Me gustaría agregar aquí publicaciones pendientes por aprobar -->
                            </div>
                        </a>
                    </div>
                </div>

                <!-- LISTA DE PANTALLAS -->
                <div class="col-sm-12 col-md-6 col-lg-4 capa"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="pantallas">
                            <div class="icono_submenu text-center" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fa fa-cubes" style="color:#16A085"></i>
                            </div>
                            <div class="texto_submenu">
                                <h3>Lista de Pantallas</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- CAROUSEL NOTICIAS -->
                <div class="col-sm-12 col-md-6 col-lg-4 capa"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="noticias">
                            <div class="icono_submenu text-center" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fa fa-cubes" style="color:#16A085"></i>
                            </div>
                            <div class="texto_submenu">
                                <h3>Carousel Noticias</h3>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </section>
        
    <!-- ==================== FIN SUBMENU ==================== -->

    <!-- ==================== FIN DEL CONTENIDO DE LA WEB ==================== -->
    
    <!-- ==================== INICIO FOOTER ==================== -->

    <footer class="text-center text-lg-start text-muted fixed-bottom">
        <div class="footercontainer">
            <div class="footerapartado">

                <h4 class="mb-2 mt-2"> Sobre Nosotros </h4>

                <p> <a href="https://cpifpbajoaragon.com/"> CPIFP Bajo Aragon </a> </p>
                <p> <a href="https://goo.gl/maps/Jm5oPV6N1cwbkzff8"> C. José Pardo Sastrón, 1, 44600 Alcañiz, Teruel </a> </p>

            </div>
            <div class="footerapartado">

                <h4 class="mb-2 mt-2"> Recursos </h4>

                <p> <a href="faq"> FAQ </a> </p>


            </div>
            <div class="footerapartado">

                <h4 class="mb-2 mt-2"> Contacto </h4>

                <p> <a href=""> +34 666 66 66 66 </a> </p>
                <p class="mb-2"> <a href=""> info@midgard.com </a> </p>

            </div>
        </div>
    </footer>

    <!-- ==================== FIN FOOTER ==================== -->



    <!-- ========================== MODAL PERFIL ========================-->

    <div class="modal fade modalForm" id="perfil" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mi Perfil</h5>
                    <button type="button" class="btnModal" data-bs-dismiss="modal" aria-label="Cerrar"><i class="icono fa fa-times fa-2x" aria-hidden="true"></i></button>
                </div>
                <!-- CONTENIDO DEL MODAL PERFIL -->

                <form id="formPerfil" method="post" action="php/base.php" novalidate onsubmit="return validarCambioPass();"><!-- CAMBIAR A DONDE SEA PRECISO -->

                    <div class="modal-body"> 

                        <label id="privilegios"><?php switch($_SESSION['rol']){case 1:echo "Administrador";break;case 2:echo "Aprobador";break;case 3:echo "Publicador";break;default:echo "Sin Rol";break;}?></label>
                        <hr class="divisor"></hr>
                        <label for="fullname" class="mt-2">Nickname: <?php echo $_SESSION['id'];?></label>
                        <br>
                        <label for="fullname" class="mt-2">Nombre: <?php echo $_SESSION['nombre']?></label>
                        <br>
                        <label for="email" class="mt-2">Email: <?php echo $_SESSION['email']?></label>
                        <br>
                        <label for="dni" class="mt-2">DNI: <?php echo $_SESSION['dni']?></label>
                        <hr class="divisor"></hr>

                        <button type="button" id="changePass" class="btnModal" name="changePass" onclick="showPassField();">
                            <i class="fas fa-unlock"></i> 
                            Cambiar Contraseña
                        </button>

                        <div id="passFields" style="display: none">

                            <div class="grupo" id="grupo__clave">
                                <label for="clave" class="form-label mt-2">Contraseña Actual</label>
                                <div class="grupo-input" id="input__clave">
                                    <input type="password" class="form-control" id="clave1" name="clave1" required>
                                    <i class="validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="input-error">La contraseña debe ser de 6 a 20 digitos y contener al menos un numero.</p>
                            </div>
                            
                            <div class="grupo" id="grupo__newclave">
                                <label for="clave" class="form-label mt-2">Contraseña Nueva</label>
                                <div class="grupo-input" id="input__nuevaclave">
                                    <input type="password" class="form-control" id="newclave" name="newclave" required>
                                    <i class="validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="input-error">La contraseña debe ser de 6 a 20 digitos y contener al menos un numero.</p>
                            </div>
                                
                            <div class="grupo" id="grupo__newclaveconf">
                                <label for="clave" class="form-label mt-2">Contraseña Nueva Repetir</label>
                                <div class="grupo-input" id="input__newclaveconf">
                                    <input type="password" class="form-control" id="newclaveconf" name="newclaveconf" required>
                                    <i class="validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="input-error">Las contraseñas no coinciden.</p>
                            </div>

                            <div id="formulario__cambioPass" class="alert alert-danger fade show mt-2 mb-2 p-2 formulario__mensaje" role="alert">
                                <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> El cambio de contraseña es improcedente. </p>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="newpassButton">Cambiar Contraseña</button>
                            </div>

                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ======================== FIN MODAL PERFIL ======================-->

    <!-- ==================== MODAL PUBLICACIÓN ==================== -->
    <div class="modal fade modalForm" id="publicacion" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REALIZAR PUBLICACIÓN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post" action="php/base.php" enctype="multipart/form-data"  novalidate onsubmit="return validarPubli();">
                <div class="modal-body"> 

                <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == '1'):?>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="porDefecto">Por defecto</label>
                            <input class="form-check-input" type="checkbox" name="pantalla0" value="00:00:00:00:00:00" onclick="ocultar();">
                        
                        <!-- ICONO QUE DESPLIEGA UNA VENTANA DE AYUDA -->
                            <a tabindex="0" role="button" class="popover-dismiss" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Click aquí si quieres que esta publicación se muestre cuando no halla ninguna programada">
                                <i class="fa-solid fa-circle-info text-success" style="font-size: 18px;"></i>
                            </a>
                            <!-- Si quiere agregar un titulo al popover utiliza  title="titulo popover"  -->
                    </div>
                        <hr>
                <?php endif; ?>
                
                    <p class="m-0 mb-2">Seleccione las pantallas que mostraran su mensaje</p>
                    <div class="row mt-2 mb-0"><!-- VERIFICAR EL LARGO DE ASUNTO Y MENSAJE EN LA BASE DE DATOS PARA EVITAR ERRORES -->
                        <?php include_once "php/base.php"; checkboxPantallas();?>
                    </div>
                    <button type="button" id="botonMarcar" class="btn btn-success btn-sm mt-2" onclick="marcarTodos()">Marcar todos</button><br>
                    
                    <div class="grupo" id="grupo__asunto">
                        <label for="asunto" name="asunto" class="form-label mt-2">Asunto</label>
                        <div class="grupo-input" id="input__asunto">
                    <input type="text" class="form-control" id="asunto" name="asunto" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">El asunto es obligatorio y debe conformarse por al menos 4 digitos.</p>
                    </div>

                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea id=mensaje name="mensaje" class="form-control"cols="3" rows="3" maxlength="2300"></textarea>

                    <div class="row mt-2">
                        <p class="m-0 mb-2">Establece el rango de fechas en que tu mensaje sera público</p>
                        <div id="grupo__fechaInicio" class="col">
                            <label for="fechaInicio" class="form-label m-0">Fecha inicio</label>
                            <div class="grupo-input" id="input_fechaInicio">
                                <input id="dateA" type="date" onchange="selectDate();" class="form-control" name="fechaInicio" min="">
                                <i class="validacion-estado fas fa-times-circle" style="right: 35px;"></i>
                        </div>
                            <p class="input-error">Campo Obligatorio.</p>
                        </div>

                        <div id="grupo__fechaFin" class="col">
                            <label for="fechaFin" class="form-label m-0">Fecha fin</label>
                            <div class="grupo-input" id="input__fechaFin">
                                <input id="dateB" type="date" onchange="selectDate();" class="form-control" name="fechaFin" min="" disabled>
                                <i class="validacion-estado fas fa-times-circle" style="right: 35px;"></i>
                        </div>
                            <p class="input-error">Campo Obligatorio.</p>
                    </div>
                </div>

                    <div id="campo__publiImg" class="mt-2">
                        <div class="grupo-input" id="grupo__publiImg">
                            <input class="form-control" type="file" id="publiImg" accept="image/*,.pdf" name="publiImg">
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">Este campo es obligatorio en caso de no haber mensaje.</p>
                    </div>

                    <div id="formulario__publicacion" class="alert alert-danger fade show mt-2 mb-2 p-2 formulario__mensaje" role="alert">
                        <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>
                </div>

                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="publiButton">Publicar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ==================== FIN MODAL PUBLICACIÓN ==================== -->


<!-- ==================== MODAL USUARIO ==================== -->
<div class="modal fade" id="usuario" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AÑADIR NUEVO USUARIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- CONTENIDO DEL MODAL USUARIO -->
                <form id="formUser" method="post" action="php/base.php" novalidate onsubmit="return validarUser();">
                <div class="modal-body">
                
                    <div class="grupo" id="grupo__username">
                        <label for="username" class="form-label mt-2">Username</label>
                        <div class="grupo-input" id="input__username">
                            <input type="text" class="form-control" id="username" name="username"required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">El usuario tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras o guion.</p>
                    </div>

                    <div class="grupo" id="grupo__clave">
                        <label for="clave" class="form-label mt-2">Contraseña</label>
                        <div class="grupo-input" id="input__clave">
                            <input type="text" class="form-control" id="clave" name="clave" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">La contraseña debe ser de 6 a 20 digitos y contener al menos un numero.</p>
                    </div>

                    <div class="grupo" id="grupo__fullname">
                        <label for="fullname" class="form-label mt-2">Nombre Completo</label>
                        <div class="grupo-input" id="input__fullname">
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">Su nombre debe tener de 4 a 50 dígitos y solo puede contener letras y espacios.</p>
                    </div>

                    <div class="grupo" id="grupo__email">
                        <label for="email" class="form-label mt-2">Email</label>
                        <div class="grupo-input" id="input__email">
                            <input type="text" class="form-control" id="email" name="email" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">El email es incorrecto.</p>
                    </div>

                    <div class="grupo" id="grupo__dni">
                        <label for="dni" class="form-label mt-2">DNI</label>
                        <div class="grupo-input" id="input__dni">
                        <input type="text" class="form-control" id="dni" name="dni" required>
                        <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">Un DNI se compone de 8 numeros y una letra.</p>
                    </div>
                    
                    <select name="rol" id="rol" class="mt-2">
                        <option value="select" hidden selected>Seleccione un rol</option>
                        <option value="1">Admin</option>
                        <option value="2">Aprobador</option>
                        <option value="3">Publicador</option>
                    </select> 
                </div>

                <div id="formulario__publicacion" class="alert alert-danger fade show mt-2 mb-2 p-2 formulario__mensaje" role="alert">
                    <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="userButton">Registrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ==================== FIN MODAL USUARIO ==================== -->

    <!-- ==================== MODAL PANTALLA ==================== -->
    <div class="modal fade" id="pantalla" tabindex="-1" aria-labelledby="modalPantalla" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AÑADIR PANTALLA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- CONTENIDO DEL MODAL PANTALLA -->
                <form method="post" action="php/base.php" id="formPantalla" onsubmit="return validarPantalla();">
                <div class="modal-body"> 
                    
                    <div class="grupo" id="grupo__nombre">
                        <label for="nombre" class="form-label mt-2" >Nombre Pantalla</label>
                        <div class="grupo-input" id="input__nombre">
                            <input type="text" class="form-control" id="nombre"  name="nombre" placeholder="Ej: LOSCOS 1 " maxlength="12" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">El nombre de pantalla debe tener al menos 3 caracteres.</p>
                    </div>

                    <div class="grupo" id="grupo__mac">
                    <label for="mac" class="form-label mt-2">Dirección MAC</label>
                        <div class="grupo-input" id="input__mac">
                            <input type="text" class="form-control" id="mac" name="mac" placeholder="a1:b2:c3:d4:e5:f6" maxlength="17" style="text-transform: uppercase" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">Introduzca una Mac valida.</p>
                    </div>
                   
                    <div class="grupo" id="grupo__ubicacion">
                    <label for="ubicacion" class="form-label mt-2">Ubicación Pantalla</label>
                        <div class="grupo-input" id="input__mac">
                        <textarea name="ubicacion" id="ubicacion" class="form-control" cols="3" rows="3" maxlength="500" placeholder="Ej: Edificio Botánico LOSCOS" required></textarea>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="input-error">Introduce de forma breve donde se ubica.</p>
                    </div>

                    <div id="formulario__mensaje" class="alert alert-danger fade show mt-2 mb-2 p-2 formulario__mensaje" role="alert">
                        <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="pantaButton">Registrar</button>
                
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ==================== FIN MODAL PANTALLA ==================== -->

    <!-- ==================== FIN DEL CONTENIDO DE LA WEB ==================== -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/macscript.js"></script>
    <?php include_once "php/base.php"; rol(); ?> 
    

    </body>
</html>