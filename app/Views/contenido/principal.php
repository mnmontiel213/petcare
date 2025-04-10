
<!--- CAROUSEL --->
<div class="container-sm">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active contenedorFoto1">
                <img src= "<?php echo base_url("assets/img/messi.jpg") ?>"  class="d-block vh-100 mx-auto foto1" alt="foto1">
                <p class="prueba">prueba foto 1</p>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url("assets/img/cuti.jpg") ?>" class="d-block vh-100 mx-auto" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url("assets/img/dibu.jpg") ?>" class="d-block vh-100 mx-auto" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>