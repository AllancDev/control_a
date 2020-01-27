<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Control_A - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/assets/css/main.css">

</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form user"  id = "user"  method = "POST">
					<span class="login100-form-title p-b-43">
						Faça login para continuar
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Digite o código da empresa: ">
						<input class="input100" type="text" id="companies" name="companies" >
						<span class="focus-input100"></span>
						<span class="label-input100">Empresa</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "E-mail válido é necessário: ex@abc.xyz">
						<input class="input100" type="text" id="email" name="email" >
						<span class="focus-input100"></span>
						<span class="label-input100">E-mail</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Senha obrigatória">
						<input class="input100" type="password" id="i_password" name="i_password" >
						<span class="focus-input100"></span>
						<span class="label-input100">Senha</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Lembrar
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Esqueceu sua senha?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							ou inscreva-se
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-linkedin" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('<?= BASE_URL ?>/assets/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
	<script src="<?= BASE_URL ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= BASE_URL ?>/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?= BASE_URL ?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= BASE_URL ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= BASE_URL ?>/vendor/select2/select2.min.js"></script>
	<script src="<?= BASE_URL ?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= BASE_URL ?>/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?= BASE_URL ?>/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?= BASE_URL ?>/assets/js/main.js"></script>

</body>
</html>