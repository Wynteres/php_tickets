<?php 
require "connection.php";

$conn = connect(); // abre conexao

// query para buscar todos usuarios
$sql = "SELECT * FROM er_users";
$result = $conn->query($sql);

// Array contendo os usuarios de sistema da empresa
$users = mysqli_fetch_all($result);


// query para buscar todos setores
$sql = "SELECT * FROM er_areas";
$result = $conn->query($sql);

// Array contendo os setores da empresa
$areas = mysqli_fetch_all($result);

// query para buscar todas categorias
$sql = "SELECT * FROM er_categories";
$result = $conn->query($sql);

// Array contendo as possiveis categorias
$categories = mysqli_fetch_all($result);

// query para buscar todas sub-categorias
$sql = "SELECT * FROM er_subcategories";
$result = $conn->query($sql);

// Array contendo as possiveis sub-categorias
$subcategoriesTemp = mysqli_fetch_all($result);

$subcategories = Array();

foreach ($subcategoriesTemp as $key => $sub) {
	// array_push($subcategories[$sub[2]], $sub);
	$subcategories[$sub[2]][$sub[0]] = $sub;
}	

disconnect($conn);

?>