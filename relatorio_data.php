<?php
	include_once('php/conexao.php');
	if(!isset($_SESSION)){
		session_start();
	}
	if (!isset($_SESSION['idFuncionario'])) {
		header('Location:login.php');
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Relatorio por Data</title>
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
		Relatório por Data
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

	</nav><br><br><br>

		
		<div class="wrapper"><br><br>
			
			<section class="h-100">
				<div class="container h-100">
					<div class="row justify-content-md-center h-100">
						<div class="card-wrapper">
							
							<div class="card fat">
								<div class="card-body">
									<form method="POST" action="php/proc_relatorio_data.php" class="my-login-validation" >
										<div class="container">
											<div class="row">
												<div class="col-md-6">
													<h1 style="font-weight: 600; font-size: 200%;">Horario do Agendamento</h1><br>
													
													<div class="form-group">
														<label for="date">Informe a data</label>
														<input id="date" type="date" class="form-control" name="date" value="" required autofocus>
														<div class="invalid-feedback">
															Informe a Data
														</div>
													</div>
													<div class="form-group">
														<label for="dia">Cadastros no Dia:</label>
														<input id="dia" type="text" class="form-control" name="dia" <?php if(isset($_SESSION['qt_cad'])){echo('value="'. $_SESSION['qt_cad'] .'"'); unset($_SESSION['qt_cad']);} ?> autofocus readonly>
														<div class="invalid-feedback">
															Cadastros no Dia:
														</div>
													</div>
													<div class="form-group">
														<label for="animais">Animais Cadastrados no Dia:</label>
														<input id="animais" type="text" class="form-control" name="animais" <?php if(isset($_SESSION['qt_pet'])){echo('value="'. $_SESSION['qt_pet'] .'"'); unset($_SESSION['qt_pet']);} ?> data-eye readonly >
														<div class="invalid-feedback">
															Animais Cadastrados no Dia:
														</div>
													</div>
													<div class="form-group">
														<label for="vendas">Vendas no Dia:</label>
														<input id="vendas" type="text" class="form-control" name="vendas" <?php if(isset($_SESSION['qt_pag'])){echo('value="'. $_SESSION['qt_pag'] .'"'); unset($_SESSION['qt_pag']);} ?> data-eye readonly>
														<div class="invalid-feedback">
															Vendas no Dia:
														</div>
													</div>
													<div class="form-group">
														<label for="atendimento">Atendimentos no Dia:</label>
														<input id="atendimento" type="text" class="form-control" name="atendimento" <?php if(isset($_SESSION['qt_atendimento'])){echo('value="'. $_SESSION['qt_atendimento'] .'"'); unset($_SESSION['qt_atendimento']);} ?> data-eye readonly>
														<div class="invalid-feedback">
															Atendimentos Totais
														</div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<button  class="btn btn-primary btn-lg btn-block">
															Procurar
														</button>
													</div>
												</div>
											</div>
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

    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	

</body>
</html>