<!DOCTYPE html>
<html lang="en">

<head>
	<title>connexion</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="codedthemes">
	<meta name="author" content="codedthemes">

	<?php require_once('style.php') ?>

</head>

<body>
	<section class="login p-fixed d-flex text-center">
		<!-- Container-fluid starts -->
		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12">
					<div class="login-card card-block">
						<form class="md-float-material">
							<h3 class="text-center txt-primary">Se connecter</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="md-input-wrapper">
										<input type="email" class="md-form-control" required="required" />
										<label>Votre matricule</label>
									</div>
								</div>
								<div class="col-md-12">
									<div class="md-input-wrapper">
										<input type="password" class="md-form-control" required="required" />
										<label>Mot de passe</label>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-10 offset-xs-1">
									<button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
								</div>
							</div>
							<!-- <div class="card-footer"> -->
							<div class="col-sm-12 col-xs-12 text-center">
								<span class="text-muted">Avew-vous un compte</span>
								<a href="Register.php" class="f-w-600 p-l-5">Creer compte</a>
							</div>

							<!-- </div> -->
						</form>
						<!-- end of form -->
					</div>
					<!-- end of login-card -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row -->
		</div>
		<!-- end of container-fluid -->
	</section>

	<?php require_once('script.php') ?>

</body>

</html>