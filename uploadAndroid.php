<?php

//ruta donde se guardarán los archivos
$target_path = "http://projecteuf2.esy.es/upload";
 
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{
    echo "El archivo ".  basename( $_FILES['uploadedfile']['name']).
    " ha sido subido correctamente.";
} 
else
{
    echo "Error, preguntarle a Xavi.";
    echo "Nombre de archivo: " .  basename( $_FILES['uploadedfile']['name']);
    echo "Directorio: " .$target_path;
}
?>