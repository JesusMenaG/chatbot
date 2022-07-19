<?php
//Conexión a la BD
$servidor="localhost";
$nombreBD="bot";
$usuario="lasespad_wp135";
$pass="7)4K]7pSA2";
$conn = new mysqli($servidor,$usuario,$pass,$nombreBD);
if ($conn -> connect_error ) {
	# code...
	die("No se pudo conectar");
}

// Obetner el mensaje del usuario atravez de ajax
$getMesg = mysqli_real_escape_string($conn,$_POST['text']);

// comprobando la consulta del usuario a la consulta de la base de datos
$check_data = "SELECT replies FROM bot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn,$check_data) or die("Error");

//si el usuario consulta la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a otra declaración
if(mysqli_num_rows($run_query) > 0){
    //obteniendo la reproducción de la base de datos de acuerdo con la consulta del usuario
    $fetch_data = mysqli_fetch_assoc($run_query);
    //almacenando la respuesta a una variable que enviaremos a ajax
    $replay = $fetch_data['replies'];
    echo $replay;

}else{
    echo "Sorry can't be able to understand you!";
}
?>
