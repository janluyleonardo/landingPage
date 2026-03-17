<!DOCTYPE html>
<html lang="es in">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="../IMG/favicon.ico"/>
        <link rel="stylesheet" href="../CSS/bootstrap.min.css"/>
        <link rel="stylesheet" href="../CSS/estilos_propios.css?v1"/>
        <link rel="stylesheet" href="../CSS/fuentes.css?v1"/>
        <link rel="stylesheet" href="../CSS/estilos_movil.css?v1"/>
        <title>Landig | Page</title>
    </head>
    <body>
        <?php
        include ('ClassOracle.php');
        $rutaEnlacePolitica = "https://www.entregaresultados.net/WebsiteResultados/PortalIdime/TermOlvi.php";
        $rutaEnlaceTratamiento ="../Doc/Politica tratamiento de datos personales.pdf";
        //si se ha enviado el correo recibimos la variable s
        if(isset($_REQUEST['s'])){
                $ok = $_REQUEST['s'];
                if($ok == 'si'){
                    echo "<div class='msn-ok' style=' font-size: 12px !Important;'>
                <span class='cerrar'>
                    <a href='/landingPage'>
                        <img src='../IMG/btnSalir.png' width='25px'/>
                    </a> <!--este es el boton de salir de la pantalla que muestra cada boton-->
                </span>
                <center>
                    <table border='0' class='alerta'>
                        <tr>
                            <td class='bordeAlertaOK'>
                                Gracias por registrarte, pronto un<br> asesor se pondra en contacto.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Estamos atentos a resolver<br> tus inquietudes.
                            </td>
                        </tr>
                    </table>
                </center>
            </div>";
                }else if($ok == 'no'){
                    echo "<div><div class='msn-ko' style=' font-size: 12px !Important;'>
                <span class='cerrar'>
                    <a href='/landingPage'>
                        <img src='../IMG/btnSalir.png' width='25px'/>
                    </a> <!--este es el boton de salir de la pantalla que muestra cada boton-->
                </span>
                <center>
                    <table border='0' class='alerta'>
                        <tr>
                            <td class='bordeAlertaKO'>
                                Autoriza el tratamiento de datos<br> personales porfavor.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Acepta la política de privacidad<br> porfavor.
                            </td>
                        </tr>
                    </table>
                </center>
            </div>";
                }
        }else {

        }
        ?>
        <div class="verde">
            <div class="centrado">
                <div class="compromiso">
                    <center>
                        <img src="../IMG/logoidime.png" id="imgCompromiso">
                        Nuestro <b>compromiso</b> es con<br>
                        <b>tu salud</b> y la de <b>tu familia</b>.<br><br>
                        <div class="previene">
                            Previene y detecta el <b>COVID - 19</b><br>
                            de forma rápida y confiable
                        </div><br>
                        <!--table border="0" class="pruebas">
                            <tr><td class="borde">PCR <b>$170.000</b></td></tr>
                            <tr><td class="borde">Antigenos <b>$68.000</b></td></tr>
                            <tr><td>Anticuerpos <b>$45.000</b></td></tr>
                        </table--><br>
                        <div class="domicilio">
                            ¡Solicítalas también a domicilio!
                        </div>
                        Valor adicional: <b>$35.000</b><br><br><br>
                        <p>
                            Somos uno de los laboratorios clinico<br>
                            privados habilitados por el Instituto Nacional<br>
                            de salud para la toma y procesamiento de<br>
                            pruebas COVID - 19.
                        </p>
                    </center>
                </div>
                <div class="derecho">
                    <div class="formulario">
                        <form action="enviaCorreo.php" method="post" id="form"enctype="multipart/form-data">
                            <div class="encabezado">
                                <div class="tituloleft"></div>    
                                <div class="tituloCenter">
                                    <b>Agenda tu cita</b>
                                </div>
                                <div class="tituloright"></div>
                            </div>
                            <br>
                            <input type="text" name="txtNombre" title="Ingrese su nombre" placeholder="Nombre:" required=""/>
                            <input type="text" name="txtApellido" title="Ingrese su apellido" placeholder="Apellido:" required=""/>
                            <select name="tipoDocumento" required="">
                                <?php
                                $selected = "";
                                $SqlCon = "SELECT COD_TIP_DOC, DESCRIPCION FROM TIPO_DOCUMENTOS  ORDER BY DESCRIPCION ASC";
                                $objOra = new OraSql();
                                $reg = $objOra->OrConsul($SqlCon);
                                ?>
                                <option value="">Tipo documento</option>
                                <?php
                                foreach ($reg as $val) {
                                    ?>
                                    <option value="<?php echo $val['DESCRIPCION']; ?>" <?php echo $selected; ?>><?php echo $val['DESCRIPCION']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="number" name="numDocumento" title="Ingrese su numero de documento" placeholder="N° de documento:" required=""/>
                            <input type="email" name="email" title="Ingrese su correo electrónico" placeholder="Correo electrónico:" required=""/>
                            <input type="number" name="numTelefono" title="Ingrese su número de celular" placeholder="Celular:" required=""/>
                            <select name="ciudad" required="">
                                <option>Ciudad</option><option>Barrancabermeja</option><option>Bucaramanga</option>
                                <option>Chía</option><option>Chiquinquirá</option><option>Ciénaga</option>
                                <option>Girardot</option><option>Medellín</option><option>Tunja</option>
                                <option>Valledupar</option><option>Zipaquirá</option>
                            </select>
                            <input type="textarea" name="txtMensaje"title="Ingrese su mensaje" placeholder="Mensaje:" required=""/>
                            <div class="checks">
                                <label class="container" id="c1">
                                    <a  href='<?php echo '' . $rutaEnlaceTratamiento; ?>' target='_blank' onClick="window.open(this.href, this.target, 'width=600,height=400'); ">Autoriza el tratamiento de datos personales.</a>
                                    <input type="checkbox" name="chAutoriza" value="si" id="c1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container"  id="c2">
                                    <a  href='<?php echo '' . $rutaEnlacePolitica; ?>' target='_blank' onClick="window.open(this.href, this.target, 'width=600,height=400'); ">Acepta política de privacidad.</a>
                                    <input type="checkbox" name="chTerminos" value="si" id="c2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="botonFormulario">
                                <input type="submit" id="btnFormulario" value="Enviar" />
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        <div class="banner">
            <div class="gris">
                <div class="tituloBanner">
                    <div class="textoTitulo">
                        Conoce las pruebas para detección<br>de <b>COVID-19</b> disponibles</p>
                    </div>
                </div>
            </div>  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="centrado">
                            <div class="bannerImagenesGeneral">
                                <div class="bannerImagenesUno">
                                    <img alt="PCR" src="../IMG/PCR.jpg" id="imagenes">
                                    <div class="estudios">
                                        <div class="estudiosTitulo">
                                            <b>PCR</b>
                                        </div>
                                        <br><br><br>
                                        <ul>
                                            <li id="primero">Más información <br>&#9660;
                                                <div class="primero">
                                                    <div class="desplegableTitulo">¿En qué consiste?</div><br>
                                                    <div class="desplegableContenido">
                                                        &#9679; Prueba de detección del material genético del virus.<br>
                                                        &#9679; Muestra naso faríngea, introduciendo un hisopo a traves de la fosa nasal hasta la faringe.<br>
                                                        &#9679; Indicadas por la OMS y OPS para confirmación diagnóstica de COVID-19.<br>
                                                    </div>   
                                                    <div class="desplegableTitulo">¿Para quiénes aplica?</div><br>
                                                    <div class="desplegableContenido">
                                                        &#9679; Personal de la salud.<br>
                                                        &#9679; Personas con sintomatología a partir del 2 día y hasta el día 14.<br>
                                                        &#9679; Contacto asintomático con casos confirmados cercanos.<br>
                                                    </div><br> 
                                                    <!--div class="pieBanerImagenes">
                                                        Valor: $170.000
                                                    </div-->
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bannerImagenesDos">
                                    <img alt="anticuerpos" src="../IMG/antigenos.jpg" id="imagenes">
                                    <div class="estudios">
                                        <div class="estudiosTitulo">
                                            <b>Antígenos</b>
                                        </div>
                                        <br><br><br>
                                        <ul>
                                            <li id="primero">Más información <br>&#9660;
                                                <div class="primero">
                                                    <div class="desplegableTitulo">¿En qué consiste?</div><br>
                                                    <div class="desplegableContenido">
                                                        &#9679; Prueba de detección de las proteínas del virus.<br>
                                                        &#9679; Muestra naso faríngea, introduciendo un hisopo a traves de la fosa nasal hasta la faringe.
                                                    </div>    
                                                    <div class="desplegableTitulo">¿Para quiénes aplica?</div><br>
                                                    <div class="desplegableContenido">
                                                        &#9679; Personas con síntomas menores a 11 días.<br>
                                                        &#9679; Población rural dispersa.
                                                    </div>
                                                    <div class="footerBanerImagenes">
<!--                                                        <div class="pieBanerImagenes">
                                                            Valor: $68.000
                                                        </div>
                                                        <div class="pieBanerImagenesGris">
                                                            <b>Tarifa válida para:</b> Medellin, Valledupar,<br> Girardot y Chia, en otras ciudades <b>$80.000</b>
                                                        </div>-->
                                                    </div>
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bannerImagenesTres">
                                    <img alt="anticuerpos" src="../IMG/anticuerpos.jpg" id="imagenes">
                                    <div class="estudios">
                                        <div class="estudiosTitulo">
                                            <b>Anticuerpos</b>
                                        </div>
                                        <br><br><br>
                                        <ul>
                                            <li id="primero">Más información <br>&#9660;
                                                <div class="primero">
                                                    <div class="desplegableTitulo">¿En qué consiste?</div><br>
                                                    <div class="desplegableContenido">
                                                        &#9679; Prueba de detección de anticuerpos producidos para combatir el virus.<br>
                                                        &#9679; Muestra de sangre.<br>
                                                        &#9679; Determina si se tuvo contagio previo, si se han desarrollado anticuerpos, además de, cuánto tiempo permanecerán en el cuerpo y si proporcionan inmunidad.<br>
                                                    </div><br>  
                                                    <div class="desplegableTitulo">¿Para quiénes aplica?</div><br>
                                                    <div class="desplegableContenido">
                                                        &#9679; Personas con sintomas mayores a 14 días.<br>
                                                    </div><br> 
                                                    <!--div class="pieBanerImagenes">
                                                        Valor: $45.000
                                                    </div-->
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><!--este br da espacio disponible para el desplegable del centro y que no se ponga debajo del siguiente letrero-->
        <div class="estadisticas">
            <div class="gris">
                <div class="tituloBanner">
                    <div class="textoTitulo">
                        Pruebas <b>COVID-19</b> en cifras a <br>nivel nacional:
                    </div>
                </div>
            </div> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="centrado">
                            <div class="datosEstadisteicasGeneral">
                                <div class="col-md-4">
                                    <div class="datoPCR">
                                        <br><b>PCR</b><br>
                                        <div class="tituloDatos">
                                            <div class="textoDatos">
                                                <b>123456</b>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="datoAntigenos">
                                        <br><b>Antígenos</b><br>
                                        <div class="tituloDatos">
                                            <div class="textoDatos">
                                                <b>789123</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Anticuerpos">
                                        <br><b>Anticuerpos</b><br>
                                        <div class="tituloDatos">
                                            <div class="textoDatos">
                                                <b>00000</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="videoEstadisticas">
                                            <img alt="videoCorporativo" src="../IMG/LoopVideo.gif" id="videoLoop">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="acerca">
            <div class="gris">
                <div class="tituloBanner">
                    <div class="textoTitulo">
                        Acerca de <br><b>Idime:</b>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="centradoAcerca">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <table border="0" class="acercaIdime">
                                    <tr>
                                        <td class="bordeFooter">
                                            Más de 30 años al cuidado de la salud.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bordeFooter">
                                            75 sedes a nivel nacional.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bordeFooter">
                                            Alta tecnología en equipos y procesos.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bordeFooter">
                                            Atencion profesional y humanizada.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nuestra operación está volcada en servirle a la gente y al medio ambiente.
                                        </td>
                                    </tr>    
                                </table>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="footer">
            <div class="centradoTextofooter">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="imagenCentroFooter">
                                <b>Porque tu salud y la de tu familia merecen toda nuestra atención</b>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>