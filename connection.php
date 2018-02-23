<?php 

function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "error_report";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    return false;
	} 
	echo '<script type="text/javascript"> console.log("Connection opened successful.") </script>';
	return $conn;
}

function disconnect($connection){
	if (mysqli_close($connection)) :
		echo '<script type="text/javascript"> console.log("Connection closed successfully.") </script>';
	else :
		echo '<script type="text/javascript"> console.log("Failure on closing connection.") </script>';
	endif; 
}


function insert($table, $fields, $values){
	
	$sql = "INSERT INTO " . $table . " ("; 
	$lenght =  sizeof($fields); // pega a quantidade de itens a serem inseriodos
	$c = 1; // inicia um contador para percorrer arrays

	foreach ($fields as $key => $field) {
		$sql = $sql . "{$field}"; // insere o field
		if($c < $lenght) : $sql = $sql . ", "; $c++; endif; // adiciona uma virgula caso nao seja o ultimo item
	}

	$sql = $sql . ") VALUES (";

	$c = 1; // zera contador para percorrer array de valores
	foreach ($values as $key => $value) {
		$sql = $sql . "'{$value}' "; // insere o field
		if($c < $lenght) : $sql = $sql . ", "; $c++; endif; // adiciona uma virgula caso nao seja o ultimo item
	}

	$sql = $sql . ");"; // finaliza a string da query


	
	// var_dump($sql);
	
	$conn = connect(); // abre conexao

	if (mysqli_query($conn, $sql)) { 
	    $msg = '<script type="text/javascript">alert("Registro inserido com sucesso.")</script>';

	} else {
	    
	    $msg = '<script type="text/javascript">alert("Error: "' . $sql . '"<br>"' . mysqli_error($conn) . '</script>';
	}

	echo $msg;

	disconnect($conn); // fecha conexao

}

?>