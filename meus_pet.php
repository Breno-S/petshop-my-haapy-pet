<?php 
	session_start();
	include_once('conexao.php');
	$_SESSION['idCliente'] = 1;

	$qt_pet = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Usuário</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	

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
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Ajuda & FAQs
						</a>

						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Minha conta
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop"><link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
	<link rel="stylesheet" type="text/css" href="css/joao.css">
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
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.html">Home</a>
							</li>

							<li>
								<a href="sobre.html">Sobre</a>
							</li>

							<li>
								<a href="servicos.html">Serviços</a>
							</li>

							<li>
								<a href="comprar.html">Comprar</a>
							</li>

							<li>
								<a href="agendamento.html">Agendamento</a>
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
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Ajuda & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Minha Conta
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
				</li>

				<li>
					<a href="sobre.html">Sobre</a>
				</li>

				<li>
					<a href="servicos.html">Serviços</a>
				</li>

				<li>
					<a href="agendamento.html">Agendamento</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="contato.html">Contato</a>
				</li>
			</ul>
		</div>

			<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg'); margin-top: 0%;">
		<h2 class="ltext-105 cl0 txt-center">
			Meus Pets
		</h2>
	</section>


	 <!-- ======= Header ======= -->
	<div class="wrapper d-flex align-items-stretch" id="teste123">
		<nav id="sidebar" class="order-last" class="img" style="background-image: url(images/bg_1.jpg);">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
				</button>
			</div>
	
			<div class="">
				<h1><a href="index.html" class="logo"><span>Conta</span></a></h1>
					<ul class="list-unstyled components mb-5">
						<li class="active">
							<a href="meus_dados.html"><span class="fa fa-user mr-3"></span> Meus Dados</a>
						</li>
						<li>
							<a href="editar_dados.html"><span class="fa fa-edit mr-3"></span>Editar Dados</a>
						</li>
						<li>
						<a href="meus_pet.php"><span class="fa fa-paw mr-3"></span>Meus Pets</a>
						</li>
						<li>
						<a href="senha_seguranca.html"><span class="fa fa-lock mr-3"></span> Senha e Segurança</a>
						</li>
						<li>
						<a href="cartao.html"><span class="fa fa-credit-card mr-3"></span>Metodo de Pagamento</a>
						</li>
						<li>
							<a href="servicos.html"><span class="fa fa-server mr-3"></span>Serviços</a>
						</li>
					</ul>

					<div class="mb-5 px-4">
								<h3 class="h6 mb-3">Sair</h3>
								<form href="login.html" class="subscribe-form">
						
					</form>
							</div>

					</div>

		</nav><br><br>

		
		<div class="wrapper">
			
			<section class="h-100" style="height: 20%!important">
				<div class="container h-100">
					<div class="row justify-content-md-center h-100">
						<div class="card-wrapper" id="cardpinci">
							
							<div class="card fat">
								<div class="d-flex flex-wrap justify-content-between align-items-center">
										<?php
										if (isset($_SESSION['msg_cad_pet'])) {
											echo $_SESSION['msg_cad_pet'];
											unset($_SESSION['msg_cad_pet']);
										}
										?>

										<?php

										$idCliente = $_SESSION['idCliente'];

										$result_pet = "SELECT * FROM cadastro_pet INNER JOIN cliente 
										on cadastro_pet.id_cliente = cliente.idCliente WHERE idCliente= $idCliente;";

										$resultado_pet = mysqli_query($conn, $result_pet);

										while ($row_pet = mysqli_fetch_assoc($resultado_pet)) {
											$img_pet = mysqli_query($conn, "SELECT * FROM imagem_pet WHERE id_pet =". $row_pet['idPet']);
											$imagem_pet = mysqli_fetch_assoc($img_pet);
											if ($qt_pet % 3 != 0) {											
										?>
											<div class="pet-container">
												<img src="
												<?php 
												if (isset($imagem_pet['dir_img_pet'])) {
													echo $imagem_pet['dir_img_pet'];
												} else {
													echo('images/imgPet/placeholder_pet.png');
												}
												?>
												" alt="" id="imagem" data-toggle="modal" data-target="#myModal<?php echo($row_pet['nome_pet']); ?>" class="img-thumbnail">
											</div>

											<!-- Modal -->
											<div class="modal fade" id="myModal<?php echo($row_pet['nome_pet']); ?>">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- cabeçalho do Modal -->
														<div class="modal-header">
															<h4 class="modal-title">Informações do Pet</h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<!-- Adicione o corpo do Modal -->
														<div class="modal-body">
															<p>
																Nome: <?php echo $row_pet['nome_pet']; ?> <br>
																Raça: <?php echo $row_pet['raca']; ?> <br>
																Cor: <?php echo $row_pet['cor_pet']; ?> <br>
																Nascimento: <?php echo $row_pet['data_nasc_pet']; ?> <br>
																Peso: <?php echo $row_pet['peso_pet']; ?>
															</p>
														</div>
														<!-- Adicione o rodapé do Modal -->
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
														</div>
													</div>
												</div>
											</div>

										<?php
											}
											else {
												?>
												</div>
												<div class="3-pets d-flex flex-wrap justify-content-between align-items-center">
													<div class="pet-container">
														<img src="
														<?php 
														if (isset($imagem_pet['dir_img_pet'])) {
															echo $imagem_pet['dir_img_pet'];
														} else {
															echo('images/imgPet/placeholder_pet.png');
														}
														?>
														" alt="" id="imagem" data-toggle="modal" data-target="#myModal<?php echo($row_pet['nome_pet']); ?>" class="img-thumbnail">
													</div>

													<!-- Modal -->
													<div class="modal fade" id="myModal<?php echo($row_pet['nome_pet']); ?>">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<!-- cabeçalho do Modal -->
																<div class="modal-header">
																	<h4 class="modal-title">Informações do Pet</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																<!-- Adicione o corpo do Modal -->
																<div class="modal-body">
																	<p>
																		Nome: <?php echo $row_pet['nome_pet']; ?> <br>
																		Raça: <?php echo $row_pet['raca']; ?> <br>
																		Cor: <?php echo $row_pet['cor_pet']; ?> <br>
																		Nascimento: <?php echo $row_pet['data_nasc_pet']; ?> <br>
																		Peso: <?php echo $row_pet['peso_pet']; ?>
																	</p>
																</div>
																<!-- Adicione o rodapé do Modal -->
																<div class="modal-footer">
																	<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
																</div>
															</div>
														</div>
													</div>
												<?php
											}
											$qt_pet++;
										}
										?>

										<a href="cadastropet.php?id_cliente=<?php echo $idCliente ?>" style="width: 30%;">
											<img src="images/pluspaw.png" style="width: 78%;">
											Adicionar novo pet
										</a>
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
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
								Increva-se
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