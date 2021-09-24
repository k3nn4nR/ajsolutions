<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .fondo {
                background-color: #fff;
                color: black;
            }

            

            .fondo .links> a {
                color: black;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .fondo .text{
                font-size: 13px;
                padding: 20px;
                position: absolute;
                left: 50px;
                top: 20px;
                margin-right: 400px;
            }

            .img{
               background-image: url('');
            }

            .about{
                min-height: 400px;
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .about_picture{
                max-width: 20%;
            }
            .about_img{
                text-align: center;
            }
            .about_img--left{
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="background-image: url('img/2.jpg');
        background-size:cover;
        height:850px;">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div>
                    <div class="title m-b-md">
                        AJ SOLUTIONS S.A.C
                    </div>

                    <div class="links">
                        <a href="">Nosotros</a>
                        <a href="">Servicios</a>
                        <a href="">Clientes</a>
                        <a href="">Contacto</a>
                        <a href="">Redes Sociales</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex-center position-ref full-height fondo">
            <div class="content">
            <div class="title m-b-md text">
                <div class="row">
                    <div class="col">
                    <p class="about_paragraph">Brindamos servicios de desarrollo e implementación de soluciones de TI, a empresas del sector privado haciendo énfasis en el desarrollo de software a medida.</p>
                    </div>
                    <div class="col">
                    <figure class="about_img">
                            <img src="img/1.jpg" class="about_picture" alt="">
                        </figure>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <p class="about_paragraph">Hacemos uso de productos de los principales fabricantes de software mundial, valiéndose para ello de las metodologías actuales y de las mejores prácticas.</p>
                    </div>
                    <div class="col">
                    <figure class="about_img about_imc--left">
                            <img src="img/fondo.jpg" class="about_picture" alt="">
                        </figure>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <p class="about_paragraph">Todo esto nos permite brindar a nuestros clientes soluciones altamente escalables, orientadas al servicio, seguras y de alta disponibilidad. Lo cual no sería posible sin el staff de profesionales que la conforman.</p>
                    </div>
                    <div class="col">
                    <figure class="about_img">
                            <img src="img/fondo.jpg" class="about_picture" alt="">
                        </figure>    
                    </div>
                </div>
                    
                        
                
                <div class="footer">
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </body>
</html>
