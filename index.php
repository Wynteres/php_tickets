<!DOCTYPE html>
<head>

	<meta charset="UTF-8">
	<meta name="description" content="Lumen Microscópios">
	<meta name="author" content="Lumen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="assets/img/favicon.png"/>

	<title>Tickets internos</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/js/dropzone/dropzone.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/dropzone/dropzone.js"></script>


	
	<!-- Initializer dos campos do formulário -->
	<?php 
		include "get_new_ticket.php";
	?>

</head>
	<body>
		<header class="bg-faded">
			<nav class="navbar navbar-toggleable-md navbar-light container">
			  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <a class="navbar-brand" href="#">Tickets M2W</a>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Novo ticket</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Categoria</a>
			      </li>
			    </ul>
			  </div>
			</nav>
		</header>
		

	<!--  conteudo -->
		<main class="container">
			<div class="p-5 text-center">
				<h1>Novo ticket</h1>
			</div>
			<div class="">
				<form action="new_ticket.php" method="post" class="row justify-content-center">
					<div class="container row">


						<!-- Select de setores -->
						<div class="col-4">
							<span><small>Setor</small></span>
							<select class="form-control" name="area" title="Setor"> 
							<?php 
								foreach ($areas as $key => $area) {
									echo "<option value=" . $area[0] . ">" . $area[1] . "</option>";
								}
						  	?>
							</select>
						</div>


						<!-- Select de categorias -->
						<div class="col-4">
							<span><small>Categoria</small></span>
							<select id="category" class="form-control" name="category" title="Categorias" > 
								<option disabled selected value="null">Selecione</option>
							<?php 
								foreach ($categories as $key => $category) {
									echo "<option id='category-{$category[0]}' value='{$category[0]}'>{$category[1]}</option>";
								}
						  	?>
							</select>
						</div>



						<!-- Select de sub-categorias -->
						<div class="col-4">
							<span><small>Sub-Categoria</small></span>

							<select class="form-control" name="subcategory" title="Sub-Categorias" id="subcategory"> 
								<option disabled selected value="null">Selecione</option>
								<!-- outras opcoes -->

							</select>
						</div>
					</div>



					<div class="container row pt-2">
						
						<!-- data da ocorrencia -->
						<div class="col-4">
							<span><small>Data de ocorrencia</small></span>
							<input required class="form-control" title="Data da ocorrencia" type="datetime-local" placeholder="Data da ocorrencia" name="ticketDate">
						</div>


						<!-- Select de usuario da ocorrencia -->
						<div class="col-4">
							<span><small>Usuário</small></span>
							<select required class="form-control" name="user" title="Usuário"> 
							<?php 
								foreach ($users as $key => $user) {
									echo "<option value=" . $user[0] . ">" . $user[1] . "</option>";
								}
						  	?>
							</select>
						</div>


						<!-- caixa de tempo para terminar procedimento -->
						<div class="col-4">
							<span><small>Tempo de Resolução</small></span>
							<input required class="form-control" type="number" placeholder="SLA em minutos" name="SLA" title="Tempo de SLA em minutos">
						</div>
					</div>

					<div class="container row">						
						<div class="col-12 pt-1">
							<span><small>Descrição</small></span>
							<textarea required class="form-control" rows="4" placeholder="Descricao" name="description"></textarea>
						</div>
					</div>
					<div class="container">
						<div class="row justify-content-center">
							<h4>Anexos</h4>	
						</div>
						<!-- 
						<div id="itens-grid" class="row col-12">
							
						</div>
						 -->
						<!-- <a href="#" id="add-image" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Add</a> -->
					</div>
				</form>

				<form action="/upload-imagens" class="dropzone" id="images-dropzone"></form>
						

			</div>
		</main>

	<!-- fim conteudo -->


		<footer>
			<script type="text/javascript">
			    var subcat = <?php echo json_encode($subcategories); ?>;
			</script>
			<script type="text/javascript" src="assets/js/main.js"></script>

		</footer>
	</body>
</html>


