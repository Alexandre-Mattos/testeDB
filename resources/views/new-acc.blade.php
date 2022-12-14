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
			<div class="menu-button" id="menu-button">
				<div class="menu-button-burger"></div>
			</div>
			<section id="side-bar">
                <a id="x-button" class="icon icon-cross"></a>
				<div class="account-info">
					<img src="./assets/user.svg" alt="Foto de Usuário" />
					<div class="info">
						<span class="name">Desconectado</span>
						<a href="/" class="btn">Fazer Login</a>
					</div>
				</div>
				<div class="items">
					<a class="item" href="">Apresentação</a>
					<a class="item" href="">Meus Imóveis</a>
					<a class="item" href="">Minhas Locações</a>
					<a class="item" href="">Buscar</a>
					<a class="item" href="">Ver Todos os Imóveis</a>
					<a class="item" href="">Minha Conta</a>
					<a class="item" href="">Sobre</a>
				</div>
			</section>
			<section class="main-section">
				<div class="golden-rectangle"></div>
				<h2>Criar Conta</h2>
				<form action="" class="new-something">
                    <div class="dado">
                        <label>Nome:</label>
                        <input placeholder="Seu Nome" type="text" />
                    </div>
                    <div class="dado">
                        <label>Email:</label>
                        <input placeholder="Seu E-mail" type="email" />
                    </div>
                    <div class="dado">
                        <label>Senha:</label>
                        <input placeholder="Sua Senha" type="password" />
                    </div>
					<button
						type="submit"
						id="create_submit"
						for="search"
						class="btn"
					>Criar Conta</button>
					
				</form>
			</section>

			<footer>
				<div class="copyright">Imobil © 2022 - all rights reserved</div>
			</footer>
		</main>
		<script src="js/main.js"></script>
	</body>
</html>
