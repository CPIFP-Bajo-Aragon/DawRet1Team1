<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Actualiza pagina cada 10 minutos -->
    <meta http-equiv="refresh" content="600">
    <title> Pantalla </title>
    <link rel="shortcut icon" href="img/webImage/Logo.ico" type="image/x-icon">
    <!-- FUENTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FONTAWESOME LIBRARY -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- BOOTSTRAP LIBRARY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/carousel.css">
</head>
<body>

    <div class="preloader">
        <div class="cssload-loader"></div>
    </div>
  
    <nav id="menu" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid d-flex align-items-center">
                <a class="navbar-brand" href="index.php">
                    <!-- LOGO -->
                    <img src="img/webImage/logoazul.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top">
                    CPIFP Bajo Aragon
                </a>

                <button id="fecha"></button>
            </div>
        </div> 
    </nav> 

        <!-- ==================== VISTA DE PANTALLAS CARRUSEL==================== -->

        <?php
            //IP Cliente
            $ip_cliente = $_SERVER["REMOTE_ADDR"];
            // echo "La ip del cliente es: ".$ip_cliente."<br>";
           
            //MAC PANTALLA
            $comando= shell_exec("arp -a ".$ip_cliente);
            $separador = explode(" ", $comando);
           
            $mac_cliente = $separador[3];
            
            //OBTENEMOS LA FECHA ACTUAL
            $hoy = getdate();
            $fechaActual = $hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"];
                
            //UTILIZAMOS EL PROCEDURE QUE ME LISTA LAS PUBLICACIONES DE LA PANTALLA QUE LE MANDE
            include_once "php/base.php";
            $con = conexion();
            $procedure = "CALL  publicacionPantalla ('$mac_cliente', '$fechaActual')";//echo $procedure;
            $stm = $con->query($procedure);
            $publicacion = $stm->fetchAll();
            //SI HAY PUBLICACIONES APROADAS EN LAS PANTALLAS
            
            $contpublicacion = 0;

            if ($publicacion) :
        ?>
            <section class="container-fluid contenedor mt-5 pt-5">
                <div class='carousel-publicaciones'>
                    <div id="carouselNoticias" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                            <?php
                            foreach($publicacion as $mensaje) :
                                if ($contpublicacion==0): //SI ES EL PRIMER ELEMENTO
                            ?>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $contpublicacion ?>" class="active" aria-current="true" aria-label="Slide <?php echo $contpublicacion ?>"></button>

                                <?php else : ?>

                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo $contpublicacion ?>" aria-label="Slide <?php echo $contpublicacion?>"></button>

                            <?php  
                                endif;
                                $contpublicacion++;
                            endforeach;
                            ?>

                        </div> <!-- FIN CAROUSEL-INDICATORS -->

                        <?php $contpublicacion = 0; ?> <!-- INICIALIZAMOS EL CONTADOR A CERO NUEVAMENTE AL SALIR DEL BUCLE -->
                
                        <div class="carousel-inner align-top">
                            
                            <?php
                            foreach($publicacion as $mensaje) :
                                if ($mensaje['imagen']!=NULL && $mensaje['mensaje']==NULL) :  //TIENE SOLO IMAGEN
                                    if ($contpublicacion==0) : //SI ES EL PRIMER ELEMENTO
                            ?>

                                    <div class="carousel-item active">
                                        <div class="divflex">
                                            <div class="soloimg">
                                                <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="d-block mx-auto" alt="..." style="height: 89vh"> <br>      
                                            </div>
                                        </div>
                                    </div>

                                    <?php else : ?> <!-- SI NO ES EL PRIMER ELEMENTO -->
                                    
                                    <div class="carousel-item">
                                        <div class="divflex">
                                            <div class="soloimg">
                                                <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="d-block mx-auto" alt="..." style="height: 89vh"> <br>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    endif;
                                    
                                elseif ($mensaje['imagen']==NULL && $mensaje['mensaje']!=NULL) : //TIENE SOLO MENSAJE
                                    if ($contpublicacion==0) : //SI ES EL PRIMER ELEMENTO
                                    ?>
                                        <div class="carousel-item active">
                                            <div class="txt" style="height: 89vh!important">
                                                <div class="text-center p-2">
                                                    <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                    <p><?php echo nl2br($mensaje['mensaje']) ?></p> <br>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <?php else : ?>

                                        <div class="carousel-item">
                                            <div class="txt" style="height: 89vh!important">
                                                <div class="text-center p-2">
                                                    <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                    <p><?php echo nl2br($mensaje['mensaje']) ?></p> <br>
                                                </div>
                                            </div>
                                        </div>

                                    <?php 
                                    endif;

                                else : //TIENE TEXTO E IMAGEN
                                    if ($contpublicacion==0) : //ES EL PRIMER ELEMENTO
                                    ?>
                                        <div class="carousel-item active">
                                            <div class="txtimg" style="height: 89vh!important">
                                                <div class="txtimg-img d-flex justify-content-center align-items-center">
                                                    <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="img-fluid" alt="..." style="height: 89vh"> <br>    
                                                </div>

                                                <div class="txtimg-txt">
                                                    <div class=" text-center p-2">
                                                        <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                        <p><?php echo nl2br($mensaje['mensaje'])?></p> <br>
                                                    </div>  
                                                </div> 
                                            </div>
                                        </div>
                                    
                                    <?php else : ?>
                                        
                                        <div class="carousel-item">
                                            <div class="txtimg" style="height: 89vh!important">
                                                <div class="txtimg-img d-flex justify-content-center align-items-center">
                                                    <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="img-fluid" alt="..." style="height: 89vh"> <br>
                                                </div>
                                                
                                                <div class="txtimg-txt">
                                                    <div class=" text-center p-2">
                                                        <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                        <p><?php echo nl2br($mensaje['mensaje'])?></p> <br>
                                                    </div>  
                                                </div> 
                                            </div>
                                        </div>

                            <?php
                                    endif;
                                endif; //FIN DEL IF QUE DETERMINA SI ES IMAGEN TEXTO O MIXTA
                            $contpublicacion++;
                            endforeach;
                            ?>
                        </div> <!-- FIN carousel-inner align-top -->
               
                <?php else : 
                    //REALIZAMOS UNA CONSULTA PARA BUSCAR LAS PUBLICACIONES POR DEFECTO
                    $resultado = porDefecto();
                    $contpublicacion = 0;
                    if ($resultado) :
                ?>
                
                <div class='carousel-publicaciones'>
                    <div id="carouselNoticias" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                            <?php
                            foreach($resultado as $mensaje) :
                                if ($contpublicacion==0): //SI ES EL PRIMER ELEMENTO
                            ?>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $contpublicacion ?>" class="active" aria-current="true" aria-label="Slide <?php echo $contpublicacion ?>"></button>

                                <?php else : ?>

                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo $contpublicacion ?>" aria-label="Slide <?php echo $contpublicacion?>"></button>

                            <?php  
                                endif;
                                $contpublicacion++;
                            endforeach;
                            ?>

                        </div> <!-- FIN CAROUSEL-INDICATORS -->

                        <?php $contpublicacion = 0; ?> <!-- INICIALIZAMOS EL CONTADOR A CERO NUEVAMENTE AL SALIR DEL BUCLE -->
                
                        <div class="carousel-inner align-top">
                            
                            <?php
                            foreach($resultado as $mensaje) :
                                if ($mensaje['imagen']!=NULL && $mensaje['mensaje']==NULL) :  //TIENE SOLO IMAGEN
                                    if ($contpublicacion==0) : //SI ES EL PRIMER ELEMENTO
                            ?>

                                    <div class="carousel-item active">
                                        <div class="divflex">
                                            <div class="soloimg">
                                                <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="d-block mx-auto" alt="..." style="height: 89vh"> <br>      
                                            </div>
                                        </div>
                                    </div>

                                    <?php else : ?> <!-- SI NO ES EL PRIMER ELEMENTO -->
                                    
                                    <div class="carousel-item">
                                        <div class="divflex">
                                            <div class="soloimg">
                                                <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="d-block mx-auto" alt="..." style="height: 89vh"> <br>      
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    endif;
                                    
                                elseif ($mensaje['imagen']==NULL && $mensaje['mensaje']!=NULL) : //TIENE SOLO MENSAJE
                                    if ($contpublicacion==0) : //SI ES EL PRIMER ELEMENTO
                                    ?>
                                        <div class="carousel-item active">
                                            <div class="txt" style="height: 89vh!important">
                                                <div class="text-center p-2">
                                                    <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                    <p><?php echo nl2br($mensaje['mensaje']) ?></p> <br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <?php else : ?>
    
                                        <div class="carousel-item">
                                            <div class="txt" style="height: 89vh!important">
                                                <div class="text-center p-2">
                                                    <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                    <p><?php echo nl2br($mensaje['mensaje']) ?></p> <br>
                                                </div>
                                            </div>
                                        </div>
    
                                    <?php 
                                    endif;
    

                                else : //TIENE TEXTO E IMAGEN
                                    if ($contpublicacion==0) : //ES EL PRIMER ELEMENTO
                                        ?>
                                            <div class="carousel-item active">
                                                <div class="txtimg" style="height: 89vh!important">
                                                    <div class="txtimg-img d-flex justify-content-center align-items-center">
                                                        <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="img-fluid" alt="..." style="height: 89vh"> <br>    
                                                    </div>
    
                                                    <div class="txtimg-txt">
                                                        <div class=" text-center p-2">
                                                            <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                            <p><?php echo nl2br($mensaje['mensaje'])?></p> <br>
                                                        </div>  
                                                    </div> 
                                                </div>
                                            </div>
                                        
                                        <?php else : ?>
                                            
                                            <div class="carousel-item">
                                                <div class="txtimg" style="height: 89vh!important">
                                                    <div class="txtimg-img d-flex justify-content-center align-items-center">
                                                        <img src="img/userImage/<?php echo $mensaje['imagen'] ?>" class="img-fluid" alt="..." style="height: 89vh"> <br>
                                                    </div>
                                                    
                                                    <div class="txtimg-txt">
                                                        <div class=" text-center p-2">
                                                            <h3><?php echo $mensaje['titulo'] ?></h3> <br>
                                                            <p><?php echo nl2br($mensaje['mensaje'])?></p> <br>
                                                        </div>  
                                                    </div> 
                                                </div>
                                            </div>
                                <?php
                                        endif;
                                endif; //FIN DEL IF QUE DETERMINA SI ES IMAGEN TEXTO O MIXTA
                            $contpublicacion++;
                            endforeach;
                            ?>
                        </div> <!-- FIN carousel-inner align-top -->
                        

                    <?php else : ?>
                        <p>La base de datos no tiene registrada ninguna publicación por defecto</p>
                    <?php
                        endif;
                    ?>
                
                <?php 
                endif; //FIN DEL IF PUBLICACION
                ?>

                    </div> <!-- FIN carouselNoticias -->
                </div> <!-- FIN carouselPublicaciones -->

                <?php 
                $stm->closeCursor(); //CIERRA EL FETCH ANTERIOR EVITANDO ERRORES

                ?>
                <br>
            </div> <!-- FIN carousel-pantalla -->

    </section>

    <!-- ==================== FIN VISTA DE PANTALLAS ==================== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <script>
        reloj = document.getElementById("fecha");
        let tiempo = new Date();

            let anio = tiempo.getFullYear();
            let mes = tiempo.getMonth()+1;
            if (mes < 10){
                mes= "0"+mes;
            }
            let dia = tiempo.getDate();
            if (dia < 10){
                dia = "0"+dia;
            }
        setInterval(() =>{
            let tiempo = new Date();
            let hora = tiempo.getHours();
            if (hora < 10){
                hora = "0"+hora;
            }
            let minutos = tiempo.getMinutes();
            if (minutos < 10){
                minutos = "0"+minutos;
            }

            reloj.innerHTML = dia+"-"+mes+"-"+anio+" "+" "+hora+":"+minutos;
        }, 1000);
    </script>
</body>
</html>