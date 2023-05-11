
<?php
	include_once('php/conexao.php');

	if(!isset($_SESSION)){
		session_start();
	}
	if (!isset($_SESSION['idFuncionario'])) {
		header('Location:login.php');
	}
	else{
		if($_SESSION['cargo'] != 'Secretária' && $_SESSION['cargo'] != 'Administrador'){
			header('Location:login.php');
		}
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Pets</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="css/joao.css">
<!--===============================================================================================-->

<!-- Biblioteca de Animações CSS | START -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Biblioteca de Animações CSS | END -->

<!-- Arquivos CSS | START -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/boot.css" />
<link rel="stylesheet" href="./css/style.css" />
<!-- Arquivos CSS | END -->

</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					Frete grátis para pedidos padrão acima de R$50
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="ajuda.html" class="flex-c-m trans-04 p-lr-25">
						Ajuda & FAQs
					</a>

					<a href="php/checa_login.php" class="flex-c-m trans-04 p-lr-25">
						Minha conta
					</a>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">
				
				<!-- Logo desktop -->		
				<a href="index.html" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li>
							<a href="index.html">Home</a>
						</li>

						<li class="active-menu">
							<a href="sobre.html">Sobre</a>
						</li>

						<li>
							<a href="comprar.html">Comprar</a>
						</li>

						<li>
							<a href="carrinho.html">Carrinho</a>
						</li>

						<li>
							<a href="agendamento.php">Agendamento</a>
						</li>


						<li>
							<a href="blog.html">Blog</a>
						</li>

						<li>
							<a href="contato.html">Contato</a>
						</li>
					</ul>
				</div>	

			</nav>
		</div>	
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->		
		<div class="logo-mobile">
			<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
				<i class="zmdi zmdi-search"></i>
			</div>

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>

			<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
					Frete grátis para pedidos padrão acima de R$50
				</div>
			</li>

			<li>
				<div class="right-top-bar flex-w h-full">
					<a href="ajuda.html" class="flex-c-m p-lr-10 trans-04">
						Ajuda & FAQs
					</a>

					<a href="php/checa_login.php" class="flex-c-m p-lr-10 trans-04">
						Minha Conta
					</a>
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">
			<li class="active-menu">
				<a href="index.html">Home</a>
			</li>

			<li>
				<a href="sobre.html">Sobre</a>
			</li>

			<li>
				<a href="comprar.html">Comprar</a>
			</li>

			<li>
				<a href="carrinho.html">Carrinho</a>
			</li>

			<li>
				<a href="agendamento.php">Agendamento</a>
			</li>


			<li>
				<a href="blog.html">Blog</a>
			</li>

			<li>
				<a href="contato.html">Contato</a>
			</li>
		</ul>
	</div>

</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Seu carrinho
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		
			
			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Total: R$ 00.00
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="carrinho.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Carrinho
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-120" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Cadastrar Pets
	</h2>
</section>	

 <!-- ======= Header ======= -->
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="order-last" class="img" style="background-image: url(images/bg_1.jpg);">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
			</button>
		</div>

		<div class="">
			<h1><a href="index.html" class="logo"><span>Conta</span></a></h1>
				<ul class="list-unstyled components mb-5">
					<?php
						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Tosador' || $_SESSION['cargo'] == 'Veterinário'){
							echo '<li class="active">
							<a href="horario.php"><span class="fa fa-clock-o mr-3"></span> Horários</a>
							</li>';
							echo '<li class="active">
							<a href="ve_horarios_func.php"><span class="fa fa-user mr-3"></span> Atendimentos</a>
							</li>';
						}
					?>
					<li>
						<a href="relatorio.php"><span class="fa fa-book mr-3"></span>Relatórios</a>
					</li>
					<li>
						<a href="pesquisa.php"><span class="fa fa-search mr-3"></span>Pesquisa</a>
					</li>
					<?php

						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Secretária' || $_SESSION['cargo'] == 'Administrador'){
							echo '<li class="active">
							<a href="cadastro_clientes.php"><span class="fa fa-user mr-3"></span> Cadastrar clientes</a>
							</li>';
							echo '<li class="active">
							<a href="cadastro_pets.php"><span class="fa fa-user mr-3"></span> Cadastrar pets</a>
							</li>';
						}
						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Administrador'){
							echo '<li class="active">
								<a href="cadastro_funcionario.php"><span class="fa fa-user mr-3"></span> Cadastrar funcionários</a>
								</li>';

						}

						?>

				</ul>

				<div class="mb-5 px-4">
					<a href="php/proc_logout.php" class="subscribe-form">
						<h3 class="h6 mb-3">Sair</h3>
					</a>
				</div>
		</div>

	</nav>

		
		<div class="wrapper"><br><br>
			
			<section class="h-100">
				<div class="container h-100">
					<div class="row justify-content-md-center h-100">
						<div class="card-wrapper">
							
							<div class="card fat">
								<div class="card-body">
								<?php 
								if(isset($_SESSION['msg_cad_pet'])){
									echo $_SESSION['msg_cad_pet'];
									unset($_SESSION['msg_cad_pet']);
								}					
								?>
                                    
									<form action="php/proc_cad_pet_func.php" method="post" class="my-login-validation" enctype="multipart/form-data">
										<div class="form-row">
											<div class="form-group col-md-10">
												<h1>Cadastro do Pet</h1>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-10">
												<label id="name" for="nome">Nome *</label>
												<input type="text" id="nome" name="nome" class="form-control" required>
											</div>
										</div>
										
										<div class="form-row">
											<div class="col-md-5 form-group">
												<label for="especie">Espécie *</label>
												<select type="text" id="especie" name="especie" class="form-control" oninput="cores(this.value)" required>
													<option value="">Selecione seu animal</option>
													<option value="Cachorro">Cachorro</option>
													<option value="Gato">Gato</option>
													<option value="Pássaro">Pássaro</option>
											  	</select>
											</div>
											<div class="col-md-5  form-group">
											  	<label for="cor">Cor *</label>
											  	<select type="text" id="cor" name="cor" class="form-control" disabled>
													<option value="">Selecione a cor</option>
													<!-- Opções de cor para Cachorro -->
													<!-- <optgroup id="cachorroColors" label="Cores para Cachorro" style="display:none;">
													<option value="branco">Branco</option>
													<option value="preto">Preto</option>
													<option value="marrom">Marrom</option>
													<option value="mesclado">Mesclado</option>
													</optgroup> -->
													<!-- Opções de cor para Gato -->
													<!-- <optgroup id="gatoColors" label="Cores para Gato" style="display:none;">
													<option value="branco">Branco</option>
													<option value="preto">Preto</option>
													<option value="marrom">Marrom</option>
													<option value="cinza">Cinza</option>
													<option value="mesclado">Mesclado</option>
													</optgroup> -->
													<!-- Opções de cor para Pássaro -->
													<!-- <optgroup id="passaroColors" label="Cores para Pássaro" style="display:none;">
													<option value="branco">Branco</option>
													<option value="preto">Preto</option>
													<option value="azul">Azul</option>
													<option value="amarelo">Amarelo</option>
													<option value="cinza">Cinza</option>
													<option value="mesclado">Mesclado</option>
													</optgroup> -->
											  	</select>
											</div>
											
										</div>

										<div class="form-row">
											<div class="col-md-5 form-group">
												<label id="peso-label" for="peso">Peso *</label>
												<input type="text" id="peso" name="peso" class="form-control" placeholder="Exemplo: 70.5kg"required>
											</div>
											<div class="col-md-5 form-group">
												<label id="idade" for="nascimento">Data de nascimento *</label>
												<input type="date" id="nascimento" name="nascimento" class="form-control" placeholder="00/00/0000"required max="<?php echo date("Y-m-d");?>">
											</div>
										</div>

										<div class="form-row">
											
											
                                            <div class="col-md-5 form-group">
                                                <label for="sexo">Sexo *</label>
                                                <select name="sexo" id="sexo" class="form-control">
													<option value="">Selecione o sexo</option>
													<option value="Macho">Macho</option>
													<option value="Fêmea">Fêmea</option>
												</select>
                                            </div>
											<div class="col-md-5 form-group">
												<label for="cpf">CPF *</label>
												<input type="text" id="cpf" name="cpf" oninput="this.value = this.value.replace(/[^0-9\.-]/g, '').replace(/(.*)/g, '$1');" class="form-control" placeholder="000.000.000-00"required oninput="this.value = this.value.replace(/[^0-9\.-]/g, '').replace(/(\..*)\./g, '$1');">
											</div>
                                        </div>
										<div class="form-row"> 
                                            <div class="col-md-10 form-group">
                                                <label for="foto">Foto:</label>
                                                <input type="file" class="form-control" id="foto" name="foto" class="form-control-file">
                                            </div>
										</div>
										<div class="form-row">              
                                            <div class="col-md-10 form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                                            </div>
                                        </div>
										

										
										<!-- js do campo da data de nascimanto-->
												<script>
												
													// 	var nascimentoInput = document.getElementById("nascimento");
													// 	nascimentoInput.addEventListener("input", function() {
													// 	// Obtém o valor atual do campo de data de nascimento
													// 	var nascimento = nascimentoInput.value;
												
													// 	// Verifica se o valor do campo tem a primeira barra (/)
													// 	if (nascimento.indexOf('/') === -1) {
													// 		// Se não tiver, adiciona a primeira barra
													// 		if (nascimento.length > 2) {
													// 			nascimentoInput.value = nascimento.substring(0, 2) + '/' + nascimento.substring(2);
													// 		}
													// 	}
												
													// 	// Verifica se o valor do campo tem a segunda barra (/)
													// 	if (nascimento.lastIndexOf('/') === 2) {
													// 		// Se não tiver, adiciona a segunda barra
													// 		if (nascimento.length > 5) {
													// 			nascimentoInput.value = nascimento.substring(0, 5) + '/' + nascimento.substring(5, 9);
													// 		}
													// 	}
													// });
												</script>

										
										<!----------------- js da limitação do peso -------------------->
												<script>
													var pesoInput = document.getElementById("peso");
													pesoInput.addEventListener("keypress", function(event) {
													// Obtém o valor atual do campo de peso
													var peso = pesoInput.value;
												
													// Verifica se a tecla pressionada é um número ou um ponto
													if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode !== 46) {
														event.preventDefault();
													}
												
													// Verifica se o valor do campo é numérico
													if (!isNaN(peso)) {
														// Converte o valor em um número decimal
														var pesoDecimal = parseFloat(peso);
												
														// Verifica se o valor é maior que 99.99
														if (pesoDecimal > 99.99) {
														// Se for, define o campo de peso para 99.99
														pesoInput.value = "99.99kg";
														}
													}
													});
												
													pesoInput.addEventListener("blur", function() {
													// Obtém o valor atual do campo de peso
													var peso = pesoInput.value;
												
													// Verifica se o valor do campo é numérico
													if (!isNaN(peso)) {
														// Converte o valor em um número decimal
														var pesoDecimal = parseFloat(peso);
												
														// Verifica se o valor é maior que 99.99
														if (pesoDecimal > 99.99) {
														// Se for, define o campo de peso para 99.99
														pesoInput.value = "99.99kg";
														} else {
														// Se não for, adiciona "kg" ao final do valor
														pesoInput.value = pesoDecimal + "kg";
														}
													}
													});
												</script>
										  
										
												
										
										<!---------------- js da Cor/ especie --------------------->
												<script>
													let especieDropdown = document.getElementById('especie');
													let corDropdown = document.getElementById('cor');
													function cores(animal) {
														document.getElementById("cor").removeAttribute("disabled");
														if (animal == "Cachorro") {
															document.getElementById("cor").innerHTML = `
															<option value="Branco">Branco</option>
															<option value="Preto">Preto</option>
															<option value="Cinza">Cinza</option>
															<option value="Marrom">Marrom</option>
															<option value="Mesclado">Mesclado</option>
															`
														} else if (animal == "Gato") {
															document.getElementById("cor").innerHTML = `
															<option value="Branco">Branco</option>
															<option value="Preto">Preto</option>
															<option value="Cinza">Cinza</option>
															<option value="Laranja">Laranja</option>
															<option value="Marrom">Marrom</option>
															<option value="Mesclado">Mesclado</option>
															`
														} else if (animal == "Pássaro"){
															document.getElementById("cor").innerHTML = `
															<option value="Branco">Lilás</option>
															<option value="Preto">Preto</option>
															<option value="Amarelo">Amarelo</option>
															<option value="Azul">Azul</option>
															<option value="Verde">Verde</option>
															<option value="Vermelho">Vermelho</option>
															<option value="Cinza">Cinza</option>
															<option value="Marrom">Marrom</option>
															<option value="Mesclado">Mesclado</option>
															`
														}
														else {
															document.getElementById("cor").setAttribute("disabled", "");
														}

														
													}
												</script>
                                       </div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div><br><br>
			</section>
		</div>
	</div>


	<!-- <script>
			function carregar(){
				document.getElementById("nome").value=localStorage.getItem("nome");
				document.getElementById("cpf").value=localStorage.getItem("cpf");
				document.getElementById("rg").value=localStorage.getItem("rg");
				document.getElementById("data_nasc").value=localStorage.getItem("data_nasc");
				document.getElementById("celular").value=localStorage.getItem("celular");
				document.getElementById("email").value=localStorage.getItem("email");
				document.getElementById("cep").value=localStorage.getItem("cep");
				document.getElementById("estado").value=localStorage.getItem("estado");
				document.getElementById("municipio").value=localStorage.getItem("municipio");
				document.getElementById("bairro").value=localStorage.getItem("bairro");
				document.getElementById("logradouro").value=localStorage.getItem("logradouro");
				document.getElementById("numero").value=localStorage.getItem("numero");
			}
			function submeter(){
				localStorage.setItem("nome",document.getElementById("nome").value);
				localStorage.setItem("cpf",document.getElementById("cpf").value);
				localStorage.setItem("rg",document.getElementById("rg").value);
				localStorage.setItem("data_nasc",document.getElementById("data_nasc").value);
				localStorage.setItem("celular",document.getElementById("celular").value);
				localStorage.setItem("email",document.getElementById("email").value);
				localStorage.setItem("cep",document.getElementById("cep").value);
				localStorage.setItem("estado",document.getElementById("estado").value);
				localStorage.setItem("municipio",document.getElementById("municipio").value);
				localStorage.setItem("bairro",document.getElementById("bairro").value);
				localStorage.setItem("logradouro",document.getElementById("logradouro").value);
				localStorage.setItem("numero",document.getElementById("numero").value);
			}
		</script> -->
		
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categorias
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Cachorro
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Gato
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Pássaro
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Peixe
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Ajuda
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Acompanhar Pedidos
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Comprar
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Carrinho
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Entrar em contato
					</h4>

					<p class="stext-107 cl7 size-201">
						Alguma Pergunta? Informe-nos na Av. Santo Amaro, 6829 - Santo Amaro, São Paulo, SP ou ligue para +55 11 9808 04532
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Parceiro Myhappypet
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Inscreva-se
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os Direitos Reservados | by Myhappypet</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script src="js/script.js"></script>

	<!-- SCRIPT PARA VERIFICAR O CEP -->
	<script src="js/cep.js"></script>

    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	

</body>
</html>