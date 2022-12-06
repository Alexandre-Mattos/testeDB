<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>IMOBIL</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Josefin+Slab:wght@400;700&display=swap"
			rel="stylesheet"
		/>
		<link rel="icon" type="image/x-icon" href="./assets/logomenor.png" />
		<link rel="stylesheet" href="css/main.css" />

		<link rel="stylesheet" href="assets/icons/style.css" />
	</head>

	<body>
		<main>
			<section class="main-section">
				<div class="golden-rectangle"></div>
				<h2>Login</h2>
				<form  method="GET" action="{{ route('login') }}"class="new-something">
                    @csrf
					<div class="dado">
						<label>Email:</label>
						<input name="email" placeholder="Seu E-mail" type="email" />
					</div>
					<div class="dado">
						<label>Senha:</label>
						<input name="password" placeholder="Sua senha" type="password" />
					</div>
					<div class="btns">
						<button
							type="submit"
							id="create_submit"
							for="search"
							class="btn"
						>
							Entrar
						</button>
						<a class='btn' href="/create-empresa">Criar Conta</a>
					</div>
				</form>
			</section>

			<footer>
				<div class="copyright">Imobil © 2022 - all rights reserved</div>
			</footer>
		</main>
		<script src="js/main.js"></script>
	</body>
</html>
