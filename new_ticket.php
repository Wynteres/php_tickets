<?php 
require "connection.php";


// Recebe parametros do ticket
$p = 0;
if(isset($_POST['area'])){
	$fields[$p] = 'area';
	$values[$p] = $_POST['area'];
	$p++;
} else {
	$area = null;
}

if(isset($_POST['category'])){
	$fields[$p] = 'category';
	$values[$p] = $_POST['category'];
	$p++;
} else {
	$category = null;
}

if(isset($_POST['subcategory'])){
	$fields[$p] = 'subcategory';
	$values[$p] = $_POST['subcategory'];
	$p++;
} else {
	$subcategory = null;
}

if(isset($_POST['ticketDate'])){
	$fields[$p] = 'ticket_date';
	$values[$p] = $_POST['ticketDate'];
	$p++;

} else {
	$ticketDate = null;
}

if(isset($_POST['user'])){
	$fields[$p] = 'user';
	$values[$p] = $_POST['user'];
	$p++;
} else {
	$user = null;
}

if(isset($_POST['SLA'])){
	$fields[$p] = 'time_for_solution';
	$values[$p] = $_POST['SLA'];
	$p++;
} else {
	$SLA = null;
}

if(isset($_POST['description'])){
	$fields[$p] = 'description';
	$values[$p] = $_POST['description'];
	$p++;
} else {
	$description = null;
}



// define a tablea que sera atualizada
$table = "er_tickets"; 

// chama function que faz insert
insert($table, $fields, $values);

header("Location: /tickets/");
die();


?>