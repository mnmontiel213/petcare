
<!--- CAROUSEL --->
<?php 



$user_model = model('Model_Usuario');
#$user = $user_model->findAll();
$user = $user_model->where('NOMBRE', 'agus')->findAll();

#echo $user;

foreach ($user as $row){
    echo $row['NOMBRE'];
}

?>
<div class="main-conteiner">
    <figure class="conteiner-banner">
        <img class="img-fluid banner" src="<?php echo base_url("assets/img/banner.svg") ?>" alt="banner">
    </figure>


    <!--

    <div class="main-content">
        <div class="main-compromiso">
            <h2 class="title-compromiso">Compromiso con el Servicio</h2>
            <p class="text-compromiso">En VetCare, creemos que cada mascota merece atención de calidad, cariño y respeto. Nuestro compromiso con el servicio va más allá del cuidado médico: nos esforzamos por crear un ambiente de confianza y cercanía con cada familia que nos elige.

                Escuchamos, acompañamos y brindamos soluciones personalizadas, porque entendemos que cada animal es único y forma parte fundamental de tu vida. Estamos para vos, siempre que lo necesites.</p>
            <div>
                <a href="<?php echo base_url('contacto') ?>" class="btn-contacto">Contáctenos</a>
            </div>
        </div>

    </div>
    
    -->
    
    <div id="ultimos-productos" class="container">
        <h2>Ultimos productos</h2>

        <ul id="ultimos-productos-lista"> 
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?> "></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"> <img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
        </ul>

    </div>

    <!-- SERVICIOS SALUD -->
     <div>
        <h2>Salud de tu mascota</h2>
        <p>Le otorgamos los mejores cuidados a tu mascota</p>
        

        <a href=" <?php echo base_url("comercializacion") ?>">Saber mas</a>

     </div>

    <!-- TARJETAS SELECCION DE MASCOTAS -->
    <h3 class="titulo-consejo">Recomendaciones</h3>
    <div class="card-concejos">
        
        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4 img-mascotas">
                    <img src="<?php echo base_url("assets/img/card-perro.jpg")?>" class="img-fluid rounded-start" alt="perro">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Perro</h5>
                        <p class="card-text">Todo sobre perros</p>
                        <ul class="list-consejo">
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Informacion para cuidados de perros</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Consejos de salud para perros</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Selector de razas de perros</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4 img-mascotas">
                    <img src="<?php echo base_url("assets/img/card-gato.jpg") ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Gato</h5>
                        <p class="card-text">Todo sobre gatos</p>
                        <ul class="list-consejo">
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Informacion para cuidados de gatos</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Consejos de salud para gatos</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Selector de razas de gatos</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4 img-mascotas">
                    <img src="<?php echo base_url("assets/img/card-mascota.jpg") ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Mascota</h5>
                        <p class="card-text">Todo sobre mascotas</p>
                        <ul class="list-consejo">
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Informacion para cuidados de mascotas</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Consejos de salud para mascotas</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                            <li class="item-consejo">
                                <a href="<?php echo base_url('enDesarrollo') ?>">Selector de razas de mascotas</a>
                                <img class="img-flecha" src="<?php echo base_url("assets/img/flecha.png") ?>" class="img-fluid rounded-start" alt="...">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="bg-huella1">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
    <div class="bg-huella2">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
    <div class="bg-huella3">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
    <div class="bg-huella4">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
    <div class="bg-huella5">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
    <div class="bg-huella6">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
    <div class="bg-huella7">
        <img src="<?php echo base_url("assets/img/huella.svg") ?> " alt="">
    </div>
</div>


    

