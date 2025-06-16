<!-- Ingresar -->
<div class="">
    <div class="container w-50 p-3">
        <h2 class="text-center">Envianos tu consulta</h2>

        <?php
            helper('form');
            
            echo form_open('enviar_consulta', ['method' => 'post']);

            echo form_label('Titulo', 'titulo', ['class' => 'form-label']);
            echo form_input('titulo', '', ['class' => 'form-control', 'placeholder' => '']);

            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input('correo', '', ['class' => 'form-control', 'placeholder' => '']);

            echo form_label('Contenido', 'contenido', ['class' => 'form-label']);
            echo form_textarea('contenido', '', ['class' => 'form-control', 'placeholder' => '']);

            echo form_submit('Enviar', 'enviar', ['class' => 'btn btn-primary']);

            echo form_close();
        ?>
        
    </div>
</div>