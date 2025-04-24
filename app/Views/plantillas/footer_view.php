<footer class="cs-footer">
    <div class="container py-4">
        <div class="row text-center">

            <div class="col-12 col-sm-6 col-md-3 cs-footer-elements">
                <p class="cs-footer-title">Servicios</p>
                <ul class="p-0">
                    <li><a href="#">Vacunacion</a></li>
                    <li><a href="#">Castracion</a></li>
                    <li><a href="#">Radiologia y ultrasonidos</a></li>
                    <li><a href="#">Farmacia</a></li>
                    <li><a href="#">Consulta general</a></li>
                    <li><a href="#">Baños y cortes</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-3 cs-footer-elements">
                <p class="cs-footer-title">Nosotros</p>
                <ul class="p-0">
                    <li><a href="#">Carreras</a></li>
                    <li><a href="#">Nuestro equipo</a></li>
                    <li><a href="#">Nuestras mascotas</a></li>
                    <li><a href="#">Donde encontrarnos</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-3 cs-footer-elements">
                <p class="cs-footer-title">Contacto</p>
                <ul class="p-0">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Telegram</a></li>
                    <li><a href="#">Correo</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-4">
            <h2>PetCare</h2>
        </div>
    </div>

    <div id="map" style="width: 400px; height: 300px"></div> 

   <script type="text/javascript"> 
      var myOptions = {
         zoom: 8,
         center: new google.maps.LatLng(-27.472492, -58.811245),
         mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById("map"), myOptions);
   </script> 

</footer>

        <script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
    </body>
</html>