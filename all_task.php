<?php

	$action = 'read';
	require_once "task_controller.php";

?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<!-- custom css -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- font awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<header id="header">
			<nav class="navbar navbar-light bg-light">
				<div class="container">
					<a class="navbar-brand" href="#">
						<img src="assets/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
						App Lista Tarefas
					</a>
				</div>
			</nav>
		</header>

		<section class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="new_task.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="all_task.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php foreach( $list as $key => $value ): ?>
									<div class="row mb-3 tarefa">
										<div class="col-sm-9" id="id_<?= $value->id; ?>">
											<?= $value->task; ?> <strong>(<?= $value->status; ?>)</strong>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remove(<?= $value->id; ?>)"></i>
											<?php if ( $value->status == 'PENDENTE' ): ?>
											<i class="fas fa-edit fa-lg text-info" onclick="edit(<?= $value->id; ?>, '<?= $value->task; ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="check(<?= $value->id; ?>)"></i>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
					
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- js -->
		<script src="assets/js/script.js"></script>
	</body>
</html>