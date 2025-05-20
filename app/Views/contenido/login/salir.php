<?php
helper('form');
            
echo validation_list_errors();

echo form_open('login/salir', ['method' => 'get']);

echo form_submit('salir', 'salir', ['class' => 'btn btn-primary']);

echo form_close();