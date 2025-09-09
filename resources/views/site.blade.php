<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>DPI - Digital Print</title>

        <!-- hoja de estilos bootstrap -->
        {{-- @vite("resources/site/css/bootstrap.css") --}}
        <link href="{{ asset('site/css/bootstrap.css') }}" rel="stylesheet">
        <!-- hoja de estilos bootstrap -->
        
        <!-- hoja de estilos -->
        <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
        
        <!-- hoja de estilos smooth scrolling nav -->
        <link href="{{ asset('site/css/scrolling-nav.css') }}" rel="stylesheet">
        <!-- hoja de estilos smooth scrolling nav -->
        
    </head>
    
    <body id="top">
        
        <!-- header -->
        <header class="mainHeader">
            
            <!-- nav -->
            <nav class="navbar mainNavbar">
                
                <!-- container -->
                <div class="container">
                    
                    <!-- logo y boton responsive -->
                    <div class="navbar-header contenedorNavHeader">
                        
                        <!-- boton responsive -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            
                            <span class="sr-only">Men&uacute;</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        
                        </button>
                        <!-- boton responsive -->
                        
                        <!-- logo -->
                        <a class="contenedorLogoMainHeader page-scroll" href="#top">
                            
                            <!-- imagen -->
                            <img src="{{ asset('site/img/logoDPI.png') }}" class="logoMainHeader" alt="DPI - Digital print" />
                            <!-- imagen -->
                            
                            <!-- clear -->
                            <div class="clearFix">&nbsp;</div>
                            <!-- clear -->
                            
                        </a>
                        <!-- logo -->
                        
                    </div>
                    <!-- logo y boton responsive -->
                    
                    <!-- nav -->
                    <div id="navbar" class="navbar-collapse collapse">
                        
                        <!-- listado de items -->
                        <ul class="nav navbar-nav navbar-right contenedorMainNav">
                            
                            <!-- item 1 -->
                            <li class="itemMainNav">
                                <a href="#quienes-somos" class="linkMainNav page-scroll">DPI</a>
                            </li>
                            <!-- item 1 -->
                            
                            <!-- item 2 -->
                            <li class="itemMainNav">
                                <a href="#servicios" class="page-scroll linkMainNav">Servicios</a>
                            </li>
                            <!-- item 2 -->
                            
                            <!-- item 3 -->
                            <li class="itemMainNav">
                                <a href="#como-enviar" class="page-scroll linkMainNav">¿C&oacute;mo enviar?</a>
                            </li>
                            <!-- item 3 -->
                            
                            <!-- item 4 -->
                            <li class="itemMainNav">
                                <a href="#contacto" class="page-scroll linkMainNav">Contacto</a>
                            </li>
                            <!-- item 4 -->
                            
                            <!-- boton print online -->
                            <li class="itemMainNav btnPrintOnline">
                                {{-- <a href="http://www.dpi.itgapps.com" class="linkBtnPrintOnline">Print Online!</a> --}}
                                @if (Route::has('login'))
                                    @auth
                                        <a
                                            href="{{ url('/admin') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Dashboard
                                        </a>
                                    @else
                                        <a
                                            href="{{ route('login') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Print Online!
                                        </a>
                                    @endauth
                                @endif
                            </li>
                            <!-- boton print online -->
                        
                        </ul>
                        <!-- listado de items -->
                        
                    </div>
                    <!-- nav -->
                    
                </div>
                <!-- container -->
                
            </nav>
            <!-- termina nav -->
            
        </header>
        <!-- header -->
        
        <!-- imagen de fondo home -->
        <div class="bgMain">
            
            <!-- espacio en blanco nav fixed -->
            <div class="spacerNavFixed">&nbsp;</div>
            <!-- espacio en blanco nav fixed -->
            
        </div>
        <!-- imagen de fondo home -->
        
        <!-- servicios -->
        <div class="contenedorServicios" id="servicios">
            
            <!-- listado de servicios -->
            <ul class="listadoServicios container">
                
                <!-- servicio 1 -->
                <li class="itemServicio col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/servicios/servicios-1.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                    <!-- txt -->
                    <p class="txtServicios">
                        impresi&oacute;n digital
                        <br />
                        formato 45 x 32cm
                        <br />
                        konica minolta bizhub 7000
                        <br />
                        resoluci&oacute;n 1200 x 1200


                    </p>
                    <!-- txt -->
                    
                    <!-- boton precios -->
                    <a href="#" data-toggle="modal" data-target="#modalPreciosDigital" alt="DPI - Digital print" class="btnPrecios">ver precios</a>
                    <!-- boton precios -->
                    
                </li>
                <!-- servicio 1 -->
                
                <!-- servicio 2 -->
                <li class="itemServicio col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/servicios/servicios-2.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                    <!-- txt -->
                    <p class="txtServicios">
                        GRAN FORMATO
                        <br />
                        LONAS, VINILOS, BANNERS
                        <br />
                        HP LATEX 370
                        <br />
                        TINTAS ORIGINALES HP
                    </p>
                    <!-- txt -->
                    
                    <!-- boton precios -->
                    <a href="#" data-toggle="modal" data-target="#modalPreciosBanners" alt="DPI - Digital print" class="btnPrecios">ver precios</a>
                    <!-- boton precios -->
                    
                </li>
                <!-- servicio 2 -->
                
                <!-- servicio 3 -->
                <li class="itemServicio col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/servicios/servicios-3.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                    <!-- txt -->
                    <p class="txtServicios">
                        PLOTTER DE CORTE
                        <br />
                        FORMATO HASTA 120cm
                        <br />
                        GRAPHTEC 160
                    </p>
                    <!-- txt -->
                    
                    <!-- boton precios -->
                    <a href="#" data-toggle="modal" data-target="#modalPreciosPloterCorte" alt="DPI - Digital print" class="btnPrecios">ver precios</a>
                    <!-- boton precios -->
                    
                </li>
                <!-- servicio 3 -->
                
                <!-- clear -->
                <div class="clearFix">&nbsp;</div>
                <!-- clear -->
                
                <!-- servicio 4 -->
                <li class="itemServicio col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/servicios/servicios-4.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                    <!-- txt -->
                    <p class="txtServicios">
                        pliego de flyers
                        <br />
                        promo x5000
                        <br />
                        en 15 d&iacute;as
                    </p>
                    <!-- txt -->
                    
                    <!-- boton precios -->
                    <a href="#" data-toggle="modal" data-target="#modalPreciosPliegoFlyers" alt="DPI - Digital print" class="btnPrecios">ver precios</a>
                    <!-- boton precios -->
                    
                </li>
                <!-- servicio 4 -->
                
                <!-- servicio 5 -->
                <li class="itemServicio col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/servicios/servicios-5.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                    <!-- txt -->
                    <p class="txtServicios">
                        laminado
                        <br />
                        brillo + mate
                    </p>
                    <!-- txt -->
                    
                    <!-- boton precios -->
                    <a href="#" data-toggle="modal" data-target="#modalPreciosLaminados" alt="DPI - Digital print" class="btnPrecios">ver precios</a>
                    <!-- boton precios -->
                    
                </li>
                <!-- servicio 5 -->
                
                <!-- servicio 6 -->
                <li class="itemServicio col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/servicios/servicios-6.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                    <!-- txt -->
                    <p class="txtServicios">
                        doblado y 
                        <br />
                        troquelado
                    </p>
                    <!-- txt -->
                    
                    <!-- boton precios -->
                    <a href="#" data-toggle="modal" data-target="#modalPreciosDobladosTroquelados" alt="DPI - Digital print" class="btnPrecios">ver precios</a>
                    <!-- boton precios -->
                    
                </li>
                <!-- servicio 6 -->
                
            </ul>
            <!-- listado de servicios -->
            
        </div>
        <!-- servicios -->
        
        <!-- institucional -->
        <div class="fondoCelesteInstitucional" id="quienes-somos">
            
            <!-- container -->
            <div class="container">
                
                <!-- contenedor imagen -->
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 contenedorImgInstitucional">
                    
                    <!-- imagen -->
                    <img src="{{ asset('site/img/institucional/img-institucional.png') }}" class="imgServicios" alt="DPI - Digital print" />
                    <!-- imagen -->
                    
                </div>
                <!-- contenedor imagen -->
                
                <!-- contenedor txt -->
                <div class="contenedorTxtInstitucional col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    
                    <!-- txt -->
                    <p class="txtInstitucional">
                        CON S&oacute;LO 5 A&ntilde;OS EN EL &aacute;REA DIGITAL LOGRAMOS SER UNO DE LOS M&aacute;S ELEGIDOS. PORQUE CREEMOS QUE LA RELACI&oacute;N CON EL CLIENTE ES NUESTRO POTENCIAL.
                        <br />
                        <br />
                        RENOVANDO NUESTROS EQUIPOS CONSTANTEMENTE PARA PODER CUMPLIR A TIEMPO Y CON LA MEJOR CALIDAD.
                        <br />
                        <br />
                        CADA TANTO NOS ABURRIMOS Y QUEREMOS IR POR MAS!
                        POR ESO ESTAMOS FELICES DE CONTARTE QUE INCORPORAMOS IMPRESI&oacute;N DE GRAN FORMATO Y PLOTTER DE CORTE.
                    </p>
                    <!-- txt -->
                    
                    <!-- titulo te esperamos -->
                    <h3 class="tituloInstitucional">te esperamos</h3>
                    <!-- titulo te esperamos -->
                    
                </div>
                <!-- contenedor txt -->
                
            </div>
            <!-- container -->
            
        </div>
        <!-- institucional -->
        
        <!-- como enviar -->
        <div class="bgComoEnviar" id="como-enviar">
            
            <!-- container -->
            <div class="container">
                
                <!-- listado info como enviar -->
                <ul class="listadoComoEnviar">
                    
                    <!-- impresion digital -->
                    <li class="contenedorInfoComoEnviar">
                        
                        <!-- contenedor titulo -->
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 contenedorTituloInfoComoEnviar">
                            
                            <!-- titulo -->
                            <h3 class="tituloInfoComoEnviar">
                                impresion
                                <br />
                                digital
                            </h3>
                            <!-- titulo -->
                            
                        </div>
                        <!-- contenedor titulo -->
                        
                        <!-- contenedor info -->
                        <div class="contenedorTxtInfoComoEnviar col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            
                            <!-- info -->
                            <p class="txtInfoComoEnviar">
                                + Formato m&aacute;ximo: 45x32cm
                                <br />
                                + Archivos .cdr, .ai, .pdf o imagen en 300dpi
                                <br />
                                + Im&aacute;genes incrustadas, embebidas o linkeadas con resoluci&oacute;n 300dpi
                                <br />
                                + Textos convertidos a curvas
                                <br />
                                + Im&aacute;genes, vectores, tipograf&iacute;as: en CMYK
                                <br />
                                + Composici&oacute;n de fondo negro: 100% Negro
                                <br />
                                + Enviar archivos a medida real
                                <br />
                                + Rasterizar, flatear o convertir a mapa de bits todas las transparencias, sombras, degrades, mallas, s&iacute;mbolos, patrones y efectos.
                            </p>
                            <!-- info -->
                            
                        </div>
                        <!-- contenedor info -->
                        
                        <!-- clear -->
                        <div class="clearFix">&nbsp;</div>
                        <!-- clear -->
                        
                    </li>
                    <!-- impresion digital -->
                    
                    <!-- gran formato -->
                    <li class="contenedorInfoComoEnviar">
                        
                        <!-- contenedor titulo -->
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 contenedorTituloInfoComoEnviar">
                            
                            <!-- titulo -->
                            <h3 class="tituloInfoComoEnviar">
                                gran
                                <br />
                                formato
                            </h3>
                            <!-- titulo -->
                            
                        </div>
                        <!-- contenedor titulo -->
                        
                        <!-- contenedor info -->
                        <div class="contenedorTxtInfoComoEnviar col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            
                            <!-- info -->
                            <p class="txtInfoComoEnviar">
                                + Dise&ntilde;os enviados en formato de imagen: Resolución 100 y 150dpi. NO MAS DE ESTO.
                                <br />
                                + En dise&ntilde;os .cdr o .ai, las im&aacute;genes utilizadas no deben superar los 150dpi (s&oacute;lo aumentar&aacute;n el peso del archivo, no la calidad de impresi&oacute;n).
                                <br />
                                + Utilizar SIEMPRE modo de color CYMK (Prohibido el uso de RGB)
                                <br />
                                + Prohibido colocar un texto a menos de 1cm. del borde. Tambi&eacute;n se aplica a cualquier objeto que debe permanecer dentro del dise&ntilde;o impreso.
                                <br />
                                + Realizar el dise&ntilde;o al tama&ntilde;o real del producto solicitado. Si el dise&ntilde;o recibido no concuerda con la medida ingresada en el pedido, el sistema autom&aacute;ticamente lo adaptar&aacute; a la medida solicitada, ocasionando posibles deformaciones en el mismo.
                                <br />
                                + Para fondos negros utilizar C:20% M:20% Y:20% K:100%.
                                <br />
                                + No utilizar tipograf&iacute;as menores a 35 pts. o 9mm de altura.
                                <br />
                                + Eliminar todos los elementos que no vayan a imprimirse para evitar errores.
                                <br />
                                + Los dise&ntilde;os solo deben contener el trabajo a realizar, m&aacute;s las especificaciones necesarias en caso de ser &uacute;til para comprender el trabajo.
                            </p>
                            <!-- info -->
                            
                        </div>
                        <!-- contenedor info -->
                        
                        <!-- clear -->
                        <div class="clearFix">&nbsp;</div>
                        <!-- clear -->
                        
                    </li>
                    <!-- gran formato -->
                    
                    <!-- pliego flyers -->
                    <li class="contenedorInfoComoEnviar">
                        
                        <!-- contenedor titulo -->
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 contenedorTituloInfoComoEnviar">
                            
                            <!-- titulo -->
                            <h3 class="tituloInfoComoEnviar">
                                pliego
                                <br />
                                flyers
                            </h3>
                            <!-- titulo -->
                            
                        </div>
                        <!-- contenedor titulo -->
                        
                        <!-- contenedor info -->
                        <div class="contenedorTxtInfoComoEnviar col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            
                            <!-- info -->
                            <p class="txtInfoComoEnviar">
                                + Enviar archivos a medida real
                                <br />
                                + Formatos: 10x10cm, 10x15cm, 15x20cm, 10x30cm, 20x30cm
                                <br />
                                + Archivos .cdr, .ai, .pdf o imagen en 300dpi
                                <br />
                                + Im&aacute;genes incrustadas, embebidas o linkeadas con resoluci&oacute;n 300dpi
                                <br />
                                + Textos convertidos a curvas
                                <br />
                                + Im&aacute;genes, vectores, tipograf&iacute;as: en CMYK
                                <br />
                                + Composici&oacute;n de fondo negro: 100% Negro + 30% Cyan
                                <br />
                                + Dejar demas&iacute;as y/o sangr&iacute;as de 3 a 5mm de los l&iacute;mites del trabajo.
                                <br />
                                + Textos e im&aacute;genes a no menos de 4 mil&iacute;metros del corte.
                                <br />
                                + Rasterizar, flatear o convertir a mapa de bits todas las transparencias, sombras, degrades, mallas, s&iacute;mbolos, patrones y efectos.
                                <br />
                                + No utilizar pantones.
                                <br />
                                + No utilizar tipograf&iacute;as menores a 8pt caladas en fondos plenos.
                                <br />
                                + No utilizar overprints
                                <br />
                                + Tipograf&iacute;as negras en 100% Negro. 
                            </p>
                            <!-- info -->
                            
                        </div>
                        <!-- contenedor info -->
                        
                        <!-- clear -->
                        <div class="clearFix">&nbsp;</div>
                        <!-- clear -->
                        
                    </li>
                    <!-- pliego flyers -->
                    
                </ul>
                <!-- listado info como enviar -->
                
            </div>
            <!-- container -->
            
        </div>
        <!-- como enviar -->
        
        <!-- contacto -->
        <div class="bgContacto" id="contacto">
            
            <!-- container -->
            <div class="container">
                
                <!-- mapa -->
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 contenedorMapa">
                    
                    <a href="https://goo.gl/maps/gANAMhZ4bt12" target="_blank" class="linkMapa">
                        <img src="{{ asset('site/img/contacto/mapa.png') }}" class="imgMapaContacto" alt="DPI - Digital print" />
                    </a>
                    
                </div>
                <!-- mapa -->
                
                <!-- info mapa -->
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 contenedorInfoContacto">
                    
                    <!-- titulo -->
                    <h2 class="tituloContacto">contactate</h2>
                    <!-- titulo -->
                    
                    <!-- txt -->
                    <p class="txtContacto">
                        CERVANTES 1422 · C.A.B.A.
                        <br />
                        Tel.: 011 4568-2161
                        <br />
                        <a href="mailto:dpi@dpi-digital.com.ar">dpi@dpi-digital.com</a>
                        <br />
                        <a href="https://www.facebook.com/Dpi-digital-print-924077027618644/?fref=ts" target="_blank">FB/Dpi digital print</a>
                    </p>
                    <!-- txt -->
                    <li class="itemMainNav btnPrintOnline">
                        {{-- <a href="usuarios" class="linkBtnPrintOnline">Print Online!</a> --}}
                        <!-- <a href="https://www.dpi.itgapps.com" class="linkBtnPrintOnline">Print Online!</a> -->
                        @if (Route::has('login'))
                                    @auth
                                        <a
                                            href="{{ url('/admin') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Dashboard
                                        </a>
                                    @else
                                        <a
                                            href="{{ route('login') }}"
                                            class="linkBtnPrintOnline">
                                        Print Online!
                                        </a>
                                    @endauth
                                @endif
                    </li>
                </div>
                <!-- info mapa -->
                
            </div>
            <!-- container -->
            
        </div>
        <!-- contacto -->
        
        <!-- modal precios DIGITAL-->
        <div id="modalPreciosDigital" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- contenido del modal -->
                <div class="modal-content">
                        
                    <!-- boton cerrar -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- boton cerrar -->
                    
                    <!-- info modal -->
                    <div class="modal-body">
                        <img src="img/upload/precios/listadeprecios_Digital.png" class="imgModalPrecios"  alt="DPI - Digital print" />
                    </div>
                    <!-- info modal -->
                
                </div>
                <!-- contenido del modal -->
            
            </div>
        </div>
        <!-- modal precios DIGITAL-->
        <!-- modal precios BANNERS-->
        <div id="modalPreciosBanners" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- contenido del modal -->
                <div class="modal-content">
                        
                    <!-- boton cerrar -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- boton cerrar -->
                    
                    <!-- info modal -->
                    <div class="modal-body">
                        <img src="img/upload/precios/listadeprecios_Banners.png" class="imgModalPrecios"  alt="DPI - Digital print" />
                    </div>
                    <!-- info modal -->
                
                </div>
                <!-- contenido del modal -->
            
            </div>
        </div>
        <!-- modal precios BANNERS-->
        <!-- modal precios PLOTER-->
        <div id="modalPreciosPloterCorte" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- contenido del modal -->
                <div class="modal-content">
                        
                    <!-- boton cerrar -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- boton cerrar -->
                    
                    <!-- info modal -->
                    <div class="modal-body">
                        <img src="img/upload/precios/listadeprecios_Ploter_Corte.png" class="imgModalPrecios"  alt="DPI - Digital print" />
                    </div>
                    <!-- info modal -->
                
                </div>
                <!-- contenido del modal -->
            
            </div>
        </div>
        <!-- modal precios PLOTER-->
        <!-- modal precios PLIEGOS-->
        <div id="modalPreciosPliegoFlyers" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- contenido del modal -->
                <div class="modal-content">
                        
                    <!-- boton cerrar -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- boton cerrar -->
                    
                    <!-- info modal -->
                    <div class="modal-body">
                        <img src="img/upload/precios/listadeprecios_Pliego_Flyers.png" class="imgModalPrecios"  alt="DPI - Digital print" />
                    </div>
                    <!-- info modal -->
                
                </div>
                <!-- contenido del modal -->
            
            </div>
        </div>
        <!-- modal precios PLIEGOS-->
        <!-- modal precios LAMINADOS-->
        <div id="modalPreciosLaminados" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- contenido del modal -->
                <div class="modal-content">
                        
                    <!-- boton cerrar -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- boton cerrar -->
                    
                    <!-- info modal -->
                    <div class="modal-body">
                        <img src="img/upload/precios/listadeprecios_Laminados.png" class="imgModalPrecios"  alt="DPI - Digital print" />
                    </div>
                    <!-- info modal -->
                
                </div>
                <!-- contenido del modal -->
            
            </div>
        </div>
        <!-- modal precios LAMINADOS-->
        <!-- modal precios DOBLADOS TROQUELADOS-->
        <div id="modalPreciosDobladosTroquelados" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- contenido del modal -->
                <div class="modal-content">
                        
                    <!-- boton cerrar -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- boton cerrar -->
                    
                    <!-- info modal -->
                    <div class="modal-body">
                        <img src="img/upload/precios/listadeprecios_Doblado_Troquelado.png" class="imgModalPrecios"  alt="DPI - Digital print" />
                    </div>
                    <!-- info modal -->
                
                </div>
                <!-- contenido del modal -->
            
            </div>
        </div>
        <!-- modal precios DOBLADOS TROQUELADOS-->
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <!-- jQuery -->
        
        <!-- JS Bootstrap -->
        {{-- <script src="assets/js/bootstrap.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('site/js/bootstrap.min.js') }}"></script>
        <!-- JS Bootstrap -->
        
        <!-- para smooth scrolling nav -->
        {{-- <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/scrolling-nav.js"></script> --}}
        <script type="text/javascript" src="{{ asset('site/js/jquery.easing.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('site/js/scrolling-nav.js') }}"></script>
        <!-- para smooth scrolling nav -->
        
    </body>
</html>